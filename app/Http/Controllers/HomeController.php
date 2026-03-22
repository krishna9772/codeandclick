<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Models\Blogs;
use App\Models\Career;
use App\Models\Client;
use App\Models\OurWork;
use App\Models\Seo;
use App\Models\Service;
use App\Models\Subscribe;
use App\Models\Testimornial;
use App\Models\Venture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Artesaos\SEOTools\Facades\SEOTools;

class HomeController extends Controller
{

    public function generateSeo($seo,$title,$link){


        if ($title){
            SEOTools::setTitle($title);
        }
        
        SEOTools::setDescription($seo->description);
        SEOTools::setCanonical(config('app.url'));

        SEOTools::opengraph()->setUrl(config('app.url').$link);
        SEOTools::opengraph()->setTitle($seo->title);
        SEOTools::opengraph()->setDescription($seo->description);
        SEOTools::opengraph()->addImage(asset(asset('images/favicon.png')));
        SEOTools::twitter()->setSite(config('app.url').$link);
        SEOTools::twitter()->setTitle($seo->title);
        SEOTools::twitter()->setDescription($seo->description);
        SEOTools::twitter()->setImage(asset('images/favicon.png'));
        SEOTools::jsonLd()->addImage(asset('images/favicon.png'));
        SEOTools::metatags()->setKeywords(explode("/", $seo->keyword));


    }

    public function showOurWork()
    {
        $ourWorks = OurWork::query()->where('status', 'published')->get();

        $type = request('type', "");

        if ($type) {
            $ourWorks = $ourWorks->where('type', $type);
        }

        $seo = Seo::where('seoable_type', 'App\Models\OurWork')->first();

        $this->generateSeo($seo,"Our Works","/our-works");        


        return view('our-works', compact('ourWorks', 'type'));
    }

    public function showOurWorkDetails($id)
    {
        $ourWork = OurWork::find($id);

        $seo = $ourWork->seos;

        $this->generateSeo($seo,$ourWork->title,"/our-work-details/".$ourWork->id);

        return view('our-work-details', compact('ourWork'));
    }

    public function home()
    {

        $clients = Client::all();
        $services = Service::where('status', 'published')->get();
        $testimornials = Testimornial::all();

        $seo = Seo::where('seoable_type', 'App\Models\Blogs')->first();

        $this->generateSeo($seo,"","/");       
        return view('home', compact('clients', 'services', 'testimornials'));
    }

    public function showWorkWithUs()
    {
        $clients = Client::all();

        $seo = Seo::where('seoable_type', 'App\Models\Blogs')->first();

        $this->generateSeo($seo,"Work With Us","/work-with-us");        


        return view('work-with-us', compact('clients'));
    }

    public function showVentures()
    {

        $ventures = Venture::query()->where('status', 'published')->get();

        return view('ventures', compact('ventures'));
    }

    public function showServices()
    {

        $clients = Client::all();
        $services = Service::with(['works' => function ($q) {
            $q->where('status', 'published');
        }])->whereHas('works', function ($q) {
            return $q->where('status', 'published');
        })->where('status', 'published')->get();

        $testimornials = Testimornial::all();


        Log::info($services);

        $seo = Seo::where('seoable_type', 'App\Models\Service')->first();

        $this->generateSeo($seo,"Services","/services");        

        return view('services', compact('clients', 'services', 'testimornials'));
    }

    public function showServiceDetails($slug)
    {

        $service = Service::where('slug', $slug)->first();

        $seo = $service->seos;
        
        $this->generateSeo($seo,$service->title,"/service-details/".$service->slug);
        
        return view('service-details', compact('service'));
    }

    public function showBlog()
    {

        $tab = request('tab', "");

        $Headerblogs = Blogs::with('user')->where('status', 'published')->inRandomOrder()->paginate(6);

        $blogs = Blogs::with('user');

        if ($tab) {
            $blogs = $blogs->where('type', $tab);
        }

        $blogs = $blogs->where('status', 'published')->orderBy('created_at', 'desc')->paginate(6);

        $seo = Seo::where('seoable_type', 'App\Models\Blogs')->first();

        $this->generateSeo($seo,"Blog","/blog");        


        return view('blog', compact('Headerblogs', 'blogs', 'tab'));
    }

    public function Subscribe(SubscribeRequest $request)
    {
        $validated = $request->validated();

        $subscriber = Subscribe::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'receive_newsletter' => 1,
        ]);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Thank you for subscribing to our newsletter!',
                'subscriber' => $subscriber,
            ]);
        }

        return redirect()->back()->with('success', 'Thank you for subscribing to our newsletter!');
    }

    public function getSubscribers()
    {
        $search = request('search', '');

        $subscribers = new Subscribe();

        if ($search) {
            $subscribers = $subscribers->where('first_name', 'like', "%{$search}%")->orWhere('last_name', 'like', "%{$search}%")->orWhere('email', 'like', "%{$search}%");
        }

        $subscribers = $subscribers->orderBy('created_at', 'desc');

        $subscribers = $subscribers->paginate(10);

        $startPage = max($subscribers->currentPage() - 2, 1);
        $endPage = $startPage + 4;

        if ($endPage >= $subscribers->lastPage()) {
            $endPage = $subscribers->lastPage();
            $startPage = max($endPage - 4, 1);
        }

        $meta = [
            'current_page' => $subscribers->currentPage(),
            'last_page' => $subscribers->lastPage(),
            'pages' => range($startPage, $endPage),
        ];

        return view('Dashboard.Subscribers.index', compact('subscribers', 'search', 'meta'));
    }

    public function BlogDetails($uuid, $slug)
    {
        $blog = Blogs::with('user')->where('uuid', $uuid)->where('slug', $slug)->first();


        $seo = $blog->seos;

        $this->generateSeo($seo,$blog->title,"/blog/".$blog->uuid."/".$blog->slug);

        return view('blog-details', compact('blog'));
    }

    public function showCareers()
    {

        $location = request('location', "");

        $careers = Career::query()->where('status', 'published')->select('title', 'id');

        if ($location) {
            $careers->where('location', $location);
        }

        $careers = $careers->get();

        $seo = Seo::where('seoable_type', 'App\Models\Career')->first();

        $this->generateSeo($seo,"Careers","/careers");        

        return view('carrer', compact('location', 'careers'));
    }

    public function showCareerDetails($id)
    {
        $career = Career::findOrFail($id);

        return view('CareerDetails', compact('career'));
    }

    public function contact()
    {

        $seo = Seo::where('seoable_type', 'App\Models\Blogs')->first();

        $this->generateSeo($seo,"Contact","/contact");        

        return view('contact');
    }

    public function technology()
    {

        $seo = Seo::where('seoable_type', 'App\Models\Blogs')->first();

        $this->generateSeo($seo,"Technology","/technology");        

        return view('technology');
    }
}

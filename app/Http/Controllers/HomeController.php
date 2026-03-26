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
    private const SUPPORTED_LOCALES = ['en', 'mm'];

    public function generateSeo($seo, $title, $link)
    {
        $fallbackTitle = $title ?: config('app.name', 'Code and Click');
        $fallbackDescription = site_text('site.seo.default_description');
        $seoTitle = $seo?->localized('title') ?: $fallbackTitle;
        $seoDescription = $seo?->localized('description') ?: $fallbackDescription;
        $canonicalUrl = rtrim(config('app.url'), '/').$link;

        SEOTools::setTitle($seoTitle);
        SEOTools::setDescription($seoDescription);
        SEOTools::setCanonical($canonicalUrl);

        SEOTools::opengraph()->setUrl($canonicalUrl);
        SEOTools::opengraph()->setTitle($seoTitle);
        SEOTools::opengraph()->setDescription($seoDescription);
        SEOTools::opengraph()->addImage(asset('images/favicon.png'));

        SEOTools::twitter()->setSite($canonicalUrl);
        SEOTools::twitter()->setTitle($seoTitle);
        SEOTools::twitter()->setDescription($seoDescription);
        SEOTools::twitter()->setImage(asset('images/favicon.png'));

        SEOTools::jsonLd()->addImage(asset('images/favicon.png'));

        $keywords = $seo?->localized('keyword');

        if (! empty($keywords)) {
            SEOTools::metatags()->setKeywords(explode('/', $keywords));
        }
    }

    public function switchLanguage(Request $request, string $locale)
    {
        abort_unless(in_array($locale, self::SUPPORTED_LOCALES, true), 404);

        session(['locale' => $locale]);

        $referer = $request->headers->get('referer');

        if ($referer) {
            $refererHost = parse_url($referer, PHP_URL_HOST);

            if ($refererHost === null || $refererHost === $request->getHost()) {
                return redirect()->to($referer);
            }
        }

        return redirect()->route('home');
    }

    public function showOurWork()
    {
        $ourWorks = OurWork::query()->where('status', 'published')->get();

        $type = request('type', "");

        if ($type) {
            $ourWorks = $ourWorks->where('type', $type);
        }

        $seo = Seo::where('seoable_type', 'App\Models\OurWork')->first();

        $this->generateSeo($seo, site_text('site.our_work.title'), "/our-works");        


        return view('our-works', compact('ourWorks', 'type'));
    }

    public function showOurWorkDetails($id)
    {
        $ourWork = OurWork::find($id);

        $seo = $ourWork->seos;

        $this->generateSeo($seo, $ourWork->localized('title'), "/our-work-details/".$ourWork->id);

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

        $this->generateSeo($seo, site_text('site.navigation.working_with_us'), "/work-with-us");        


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

        $this->generateSeo($seo, site_text('site.navigation.what_we_do'), "/services");        

        return view('services', compact('clients', 'services', 'testimornials'));
    }

    public function showServiceDetails($slug)
    {

        $service = Service::where('slug', $slug)->first();

        $seo = $service->seos;
        
        $this->generateSeo($seo, $service->localized('title'), "/service-details/".$service->slug);
        
        return view('service-details', compact('service'));
    }

    public function showBlog(Request $request)
    {
        $tab = $request->query('tab', "");

        $Headerblogs = Blogs::with('user')
            ->where('status', 'published')
            ->inRandomOrder()
            ->limit(6)
            ->get();

        $blogs = $this->publishedBlogsQuery($tab)->paginate(6);

        $seo = Seo::where('seoable_type', 'App\Models\Blogs')->first();

        $this->generateSeo($seo, site_text('site.blog.title'), "/blog");        


        return view('blog', compact('Headerblogs', 'blogs', 'tab'));
    }

    public function loadMoreBlogs(Request $request)
    {
        $tab = $request->query('tab', "");
        $page = max((int) $request->query('page', 1), 1);

        $blogs = $this->publishedBlogsQuery($tab)->paginate(6, ['*'], 'page', $page);

        return response()->json([
            'html' => view('partials.blog-list-items', compact('blogs'))->render(),
            'has_more' => $blogs->hasMorePages(),
            'next_page' => $blogs->currentPage() + 1,
        ]);
    }

    private function publishedBlogsQuery(string $tab = "")
    {
        $blogs = Blogs::with('user')->where('status', 'published');

        if ($tab !== "") {
            $blogs->where('type', $tab);
        }

        return $blogs->orderBy('created_at', 'desc');
    }

    public function Subscribe(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email',
        ]);

        $receive_newsletter = $request->has('receive_newsletter') ? 1 : 0;

        Subscribe::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'receive_newsletter' => $receive_newsletter,
        ]);

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

        $this->generateSeo($seo, $blog->localized('title'), "/blog/".$blog->uuid."/".$blog->slug);

        return view('blog-details', compact('blog'));
    }

    public function showCareers()
    {

        $location = request('location', "");

        $careers = Career::query()->where('status', 'published')->select('title', 'title_mm', 'id');

        if ($location) {
            $careers->where('location', $location);
        }

        $careers = $careers->get();

        $seo = Seo::where('seoable_type', 'App\Models\Career')->first();

        $this->generateSeo($seo, site_text('site.careers.title'), "/careers");        

        return view('carrer', compact('location', 'careers'));
    }

    public function showCareerDetails($slug)
    {
        $career = Career::query()
            ->get()
            ->first(function (Career $career) use ($slug) {
                return $career->slug === $slug;
            });

        abort_if(! $career, 404);

        return view('CareerDetails', compact('career'));
    }

    public function contact()
    {

        $seo = Seo::where('seoable_type', 'App\Models\Blogs')->first();

        $this->generateSeo($seo, site_text('site.navigation.contact'), "/contact");        

        return view('contact');
    }

    public function technology()
    {

        $seo = Seo::where('seoable_type', 'App\Models\Blogs')->first();

        $this->generateSeo($seo, site_text('site.navigation.technology'), "/technology");        

        return view('technology');
    }
}

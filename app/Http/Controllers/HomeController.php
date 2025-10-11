<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Career;
use App\Models\Subscribe;
use App\Models\Venture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function showVentures()
    {

        $ventures = Venture::query()->where('status', 'published')->get();

        return view('ventures', compact('ventures'));
    }

    public function showBlog()
    {

        $tab = request('tab', "Blog");

        $Headerblogs = Blogs::with('user')->where('type', $tab)->where('status', 'published')->inRandomOrder()->paginate(6);

        $blogs = Blogs::with('user')->where('type', $tab)->where('status', 'published')->orderBy('created_at', 'desc')->paginate(6);
        return view('blog', compact('Headerblogs', 'blogs', 'tab'));
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

        return view('Dashboard.Subscribers.index', compact('subscribers','search','meta'));

    }

    public function BlogDetails($uuid, $slug)
    {
        $blog = Blogs::with('user')->where('uuid', $uuid)->where('slug', $slug)->first();

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

        return view('carrer', compact('location', 'careers'));
    }

    public function showCareerDetails($id)
    {
        $career = Career::findOrFail($id);

        return view('CareerDetails', compact('career'));
    }
}

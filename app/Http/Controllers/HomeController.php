<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Career;
use App\Models\Venture;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showVentures()
    {

        $ventures = Venture::query()->where('status', 'published')->get();

        return view('ventures', compact('ventures'));
    }

    public function showBlog()
    {

        $tab = request('tab',"Blog");

        $Headerblogs = Blogs::with('user')->where('type', $tab)->where('status', 'published')->inRandomOrder()->paginate(6);

        $blogs = Blogs::with('user')->where('type', $tab)->where('status', 'published')->orderBy('created_at', 'desc')->paginate(6);
        return view('blog', compact('Headerblogs','blogs','tab'));
    }

    public function BlogDetails($uuid,$slug)
    {
        $blog = Blogs::with('user')->where('uuid', $uuid)->where('slug', $slug)->first();

        return view('blog-details', compact('blog'));
    }

    public function showCareers()
    {

        $location = request('location',"");

        $careers = Career::query()->where('status', 'published')->select('title','id');
        
        if($location){
            $careers->where('location', $location);
        }

        $careers = $careers->get();

        return view('carrer', compact('location','careers'));
    }

    public function showCareerDetails($id)
    {
        $career = Career::findOrFail($id);

        return view('CareerDetails', compact('career'));
    }
}

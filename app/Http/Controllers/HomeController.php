<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Venture;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showVentures()
    {

        $ventures = Venture::all();

        return view('ventures', compact('ventures'));
    }

    public function showCareers()
    {

        $location = request('location',"");

        $careers = Career::query()->select('title','id');
        
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

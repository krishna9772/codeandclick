<?php

namespace App\Http\Controllers;

use App\Models\Venture;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showVentures()
    {

        $ventures = Venture::all();

        return view('ventures', compact('ventures'));
    }
}

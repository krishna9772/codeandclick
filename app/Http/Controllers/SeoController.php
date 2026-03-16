<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeoRequest;
use App\Models\Seo;

class SeoController extends Controller
{
    public function index()
    {
        $seo = Seo::where('seoable_type', 'App\Models\Home')->first();
        return view('Dashboard.Seo.index', compact('seo'));
    }

    public function update(SeoRequest $request)
    {
         $seo = Seo::where('seoable_type', 'App\Models\Home')->first();
         $seo->update($request->all());
         return redirect()->back()->with('success', 'SEO updated successfully');
    }
}

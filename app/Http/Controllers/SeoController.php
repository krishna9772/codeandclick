<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeoRequest;
use App\Models\Seo;

class SeoController extends Controller
{
    public function index()
    {
        $seo = Seo::where('seoable_type', 'App\Models\Home')->first();
        $seo = Seo::where('seoable_type', 'App\Models\Page')
          ->where('seoable_id', 1)
          ->first();

        SEOTools::setTitle($seo?->title ?? 'Code and Click');
        SEOTools::setDescription($seo?->description ?? 'Code and Click is a professional software development company providing web development, mobile apps, UI/UX design, and digital solutions.');
        SEOTools::setCanonical(config('app.url'));

        SEOTools::opengraph()->setUrl(config('app.url') . $link);
        SEOTools::opengraph()->setTitle($seo?->title ?? 'Code and Click');
        SEOTools::opengraph()->setDescription($seo?->description ?? 'Code and Click is a professional software development company providing web development, mobile apps, UI/UX design, and digital solutions. ');

        SEOTools::twitter()->setTitle($seo?->title ?? 'Code and Click');
        return view('Dashboard.Seo.index', compact('seo'));
    }

    public function update(SeoRequest $request)
    {
         $seo = Seo::where('seoable_type', 'App\Models\Home')->first();
         $seo->update($request->all());
         return redirect()->back()->with('success', 'SEO updated successfully');
    }
}

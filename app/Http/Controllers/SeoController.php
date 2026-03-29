<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeoRequest;
use App\Models\Seo;
use Artesaos\SEOTools\Facades\SEOTools;

class SeoController extends Controller
{
    private function defaultSeo(): Seo
    {
        return Seo::firstOrCreate(
            [
                'seoable_type' => 'App\Models\Page',
                'seoable_id' => 1,
            ],
            [
                'title' => 'Code and Click',
                'description' => 'Code and Click is a professional software development company providing web development, mobile apps, UI/UX design, and digital solutions.',
                'keyword' => 'codeandclick/web development/mobile app development/UI UX/software company',
                'title_mm' => null,
                'description_mm' => null,
                'keyword_mm' => null,
            ]
        );
    }

    public function index()
    {
        $seo = $this->defaultSeo();

        $link = '/dashboard/seo';

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
         $seo = $this->defaultSeo();

         $seo->update($request->validated());

         return redirect()->back()->with('success', 'SEO updated successfully');
    }
}

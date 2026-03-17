<?php

namespace App\Jobs;

use App\Models\Blogs;
use App\Models\OurWork;
use App\Models\Seo;
use App\Models\Service;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SiteMapGenerate implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $siteMap = Sitemap::create();

        $seo = Seo::where('seoable_type', 'App\Models\Home')->first();


        // Static pages
        $siteMap->add(Url::create('/')->setLastModificationDate($seo->updated_at)->setPriority(1));
        $siteMap->add(Url::create('/blog')->setLastModificationDate($seo->updated_at)->setPriority(1));
        $siteMap->add(Url::create('/careers')->setLastModificationDate($seo->updated_at)->setPriority(1));
        $siteMap->add(Url::create('/our-works')->setLastModificationDate($seo->updated_at)->setPriority(1));
        $siteMap->add(Url::create('/services')->setLastModificationDate($seo->updated_at)->setPriority(1));
        $siteMap->add(Url::create('/ventures')->setLastModificationDate($seo->updated_at)->setPriority(1));
        $siteMap->add(Url::create('/work-with-us')->setLastModificationDate($seo->updated_at)->setPriority(1));
        $siteMap->add(Url::create('/contact')->setLastModificationDate($seo->updated_at)->setPriority(1));
        $siteMap->add(Url::create('/technology')->setLastModificationDate($seo->updated_at)->setPriority(1));

        $blogs = Blogs::query()->where('status', 'published')->get();

        foreach ($blogs as $blog) {
            $siteMap->add(
                Url::create("/blog/{$blog->uuid}/{$blog->slug}")
                    ->setLastModificationDate($blog->updated_at)
            );
        }

        $services = Service::query()->where('status', 'published')->get();

        foreach ($services as $service) {
            $siteMap->add(
                Url::create("/services/{$service->id}")
                    ->setLastModificationDate($service->updated_at)
            );
        }

        $ourWorks = OurWork::query()->where('status', 'published')->get();

        foreach ($ourWorks as $ourWork) {
            $siteMap->add(
                Url::create("/our-works/{$ourWork->id}")
                    ->setLastModificationDate($ourWork->updated_at)
            );
        }

        $siteMap->writeToFile(public_path('sitemap.xml'));
    }
}

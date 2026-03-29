<?php

namespace App\Jobs;

use App\Models\Blogs;
use App\Models\Career;
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

        $seo = Seo::where('seoable_type', 'App\Models\Page')
            ->where('seoable_id', 1)
            ->first();
        $lastModified = $seo?->updated_at ?? now();


        // Static pages
        $siteMap->add(Url::create('/')->setLastModificationDate($lastModified)->setPriority(1));
        $siteMap->add(Url::create('/blog')->setLastModificationDate($lastModified)->setPriority(1));
        $siteMap->add(Url::create('/careers')->setLastModificationDate($lastModified)->setPriority(1));
        $siteMap->add(Url::create('/our-works')->setLastModificationDate($lastModified)->setPriority(1));
        $siteMap->add(Url::create('/services')->setLastModificationDate($lastModified)->setPriority(1));
        $siteMap->add(Url::create('/ventures')->setLastModificationDate($lastModified)->setPriority(1));
        $siteMap->add(Url::create('/work-with-us')->setLastModificationDate($lastModified)->setPriority(1));
        $siteMap->add(Url::create('/contact')->setLastModificationDate($lastModified)->setPriority(1));
        $siteMap->add(Url::create('/technology')->setLastModificationDate($lastModified)->setPriority(1));

        $blogs = Blogs::query()->where('status', 'published')->get();

        foreach ($blogs as $blog) {
            $siteMap->add(
                Url::create("/blog/{$blog->slug}")
                    ->setLastModificationDate($blog->updated_at)
            );
        }

        $services = Service::query()->where('status', 'published')->get();

        foreach ($services as $service) {
            $siteMap->add(
                Url::create("/services/{$service->slug}")
                    ->setLastModificationDate($service->updated_at)
            );
        }

        $careers = Career::query()->where('status', 'published')->get();

        foreach ($careers as $career) {
            $siteMap->add(
                Url::create("/careers/{$career->slug}")
                    ->setLastModificationDate($career->updated_at)
            );
        }

        $ourWorks = OurWork::query()->where('status', 'published')->get();

        foreach ($ourWorks as $ourWork) {
            $siteMap->add(
                Url::create("/our-works/{$ourWork->slug}")
                    ->setLastModificationDate($ourWork->updated_at)
            );
        }

        $siteMap->writeToFile(public_path('sitemap.xml'));
    }
}

<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OurWOrkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SiteTranslationController;
use App\Http\Controllers\TestimornialController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\VentureController;
use App\Jobs\SiteMapGenerate;
use App\Models\Blogs;
use App\Models\Career;
use App\Models\Client;
use App\Models\Enquiry;
use App\Models\OurWork;
use App\Models\Seo;
use App\Models\Service;
use App\Models\SiteTranslation;
use App\Models\Subscribe;
use App\Models\Testimornial;
use App\Models\Venture;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {

    // Home
    Route::get('/', 'home')->name('home');
    Route::get('/language/{locale}', 'switchLanguage')
        ->whereIn('locale', config('base.supported_locales', ['en', 'mm']))
        ->name('language.switch');

    // Blog
    Route::get('/blog', 'showBlog')->name('blog');
    Route::get('/blog/load-more', 'loadMoreBlogs')->name('blog.load-more');
    Route::get('/blog/{uuid}/{slug}', 'legacyBlogDetails')->name('blog-details.legacy');
    Route::get('/blog/{slug}', 'BlogDetails')->name('blog-details');

    // Careers
    Route::get('/careers', 'showCareers')->name('show-careers');
    Route::get('/careers/{slug}', 'showCareerDetails')->name('show-career-details');

    // Our Works
    Route::get('/our-works', 'showOurWork')->name('our-work');
    Route::get('/our-works/legacy/{id}', 'legacyOurWorkDetails')->name('our-work-details.legacy');
    Route::get('/our-works/{slug}', 'showOurWorkDetails')->name('our-work-details');

    // Services
    Route::get('/services', 'showServices')->name('services');
    Route::get('/services/{id}', 'showServiceDetails')->name('service-details');

    // Ventures
    Route::get('/ventures', 'showVentures')->name('ventures');

    // Work With Us
    Route::get('/work-with-us', 'showWorkWithUs')->name('work-with-us');
    Route::get('/privacy-policy', 'showPrivacyPolicy')->name('privacy-policy');
    Route::get('/terms-and-conditions', 'showTermsAndConditions')->name('terms-and-conditions');

    Route::get('/contact', 'contact')->name('contact');
    Route::get('/technology', 'technology')->name('technology');

    // Subscribe
    Route::post('/subscribe', 'Subscribe')->name('user.subscribe');
});

Route::post('/enquiry', [EnquiryController::class, 'store'])->name('enquiry.store');

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('', function () {
        $stats = [
            [
                'label' => 'Blogs',
                'value' => Blogs::count(),
                'meta' => Blogs::where('status', 1)->count().' active · '.Blogs::onlyTrashed()->count().' archived',
                'href' => route('bloglist.index'),
                'action' => 'Manage blogs',
                'tone' => 'from-sky-500 to-cyan-500',
            ],
            [
                'label' => 'Services',
                'value' => Service::count(),
                'meta' => Service::where('status', 1)->count().' active · '.Service::onlyTrashed()->count().' archived',
                'href' => route('services.index'),
                'action' => 'Manage services',
                'tone' => 'from-emerald-500 to-teal-500',
            ],
            [
                'label' => 'Our Work',
                'value' => OurWork::count(),
                'meta' => OurWork::where('status', 1)->count().' published · '.OurWork::onlyTrashed()->count().' archived',
                'href' => route('our-work.index'),
                'action' => 'Manage case studies',
                'tone' => 'from-violet-500 to-indigo-500',
            ],
            [
                'label' => 'Careers',
                'value' => Career::count(),
                'meta' => Career::where('status', 1)->count().' active · '.Career::onlyTrashed()->count().' archived',
                'href' => route('careers.index'),
                'action' => 'Manage careers',
                'tone' => 'from-fuchsia-500 to-pink-500',
            ],
            [
                'label' => 'Ventures',
                'value' => Venture::count(),
                'meta' => Venture::where('status', 1)->count().' active · '.Venture::onlyTrashed()->count().' archived',
                'href' => route('ventures.index'),
                'action' => 'Manage ventures',
                'tone' => 'from-amber-500 to-orange-500',
            ],
            [
                'label' => 'Enquiries',
                'value' => Enquiry::count(),
                'meta' => Enquiry::where('created_at', '>=', now()->subDays(7))->count().' in the last 7 days',
                'href' => route('enquiry.index'),
                'action' => 'Review enquiries',
                'tone' => 'from-rose-500 to-red-500',
            ],
            [
                'label' => 'Subscribers',
                'value' => Subscribe::count(),
                'meta' => Subscribe::where('created_at', '>=', now()->subDays(30))->count().' new this month',
                'href' => route('subscribers.index'),
                'action' => 'View subscribers',
                'tone' => 'from-slate-500 to-gray-600',
            ],
            [
                'label' => 'Translations',
                'value' => SiteTranslation::count(),
                'meta' => Seo::count().' SEO records · '.Client::count().' clients · '.Testimornial::count().' testimonials',
                'href' => route('site-translations.index'),
                'action' => 'Edit translations',
                'tone' => 'from-blue-600 to-indigo-600',
            ],
        ];

        $quickLinks = [
            ['label' => 'New Blog', 'href' => route('bloglist.create')],
            ['label' => 'New Service', 'href' => route('services.create')],
            ['label' => 'New Work', 'href' => route('our-work.create')],
            ['label' => 'New Career', 'href' => route('careers.create')],
            ['label' => 'SEO Settings', 'href' => route('seo.index')],
            ['label' => 'Site Translations', 'href' => route('site-translations.index')],
        ];

        $recentEnquiries = Enquiry::query()
            ->latest()
            ->take(6)
            ->get(['id', 'first_name', 'last_name', 'email', 'business_name', 'budget', 'location', 'created_at']);

        $recentContent = collect()
            ->merge(Blogs::query()->latest()->take(3)->get()->map(fn ($item) => [
                'type' => 'Blog',
                'title' => $item->title,
                'status' => $item->status ? 'Active' : 'Draft',
                'href' => route('bloglist.edit', $item->id),
                'created_at' => $item->created_at,
            ]))
            ->merge(Service::query()->latest()->take(3)->get()->map(fn ($item) => [
                'type' => 'Service',
                'title' => $item->name,
                'status' => $item->status ? 'Active' : 'Draft',
                'href' => route('services.edit', $item->id),
                'created_at' => $item->created_at,
            ]))
            ->merge(OurWork::query()->latest()->take(3)->get()->map(fn ($item) => [
                'type' => 'Our Work',
                'title' => $item->title,
                'status' => $item->status ? 'Active' : 'Draft',
                'href' => route('our-work.edit', $item->id),
                'created_at' => $item->created_at,
            ]))
            ->merge(Career::query()->latest()->take(3)->get()->map(fn ($item) => [
                'type' => 'Career',
                'title' => $item->title,
                'status' => $item->status ? 'Active' : 'Draft',
                'href' => route('careers.edit', $item->id),
                'created_at' => $item->created_at,
            ]))
            ->sortByDesc('created_at')
            ->take(8)
            ->values();

        return view('dashboard', [
            'stats' => $stats,
            'quickLinks' => $quickLinks,
            'recentEnquiries' => $recentEnquiries,
            'recentContent' => $recentContent,
        ]);
    })->name('dashboard');

    Route::resource('bloglist', BlogsController::class)->names('bloglist');
    Route::patch('bloglist/{id}/change-status', [BlogsController::class, 'changeStatus'])->name('bloglist.change-status');
    Route::post('bloglist/{id}/restore', [BlogsController::class, 'restore'])->name('bloglist.restore');

    Route::resource('ventures', VentureController::class)->names('ventures');
    Route::patch('ventures/{id}/change-status', [VentureController::class, 'changeStatus'])->name('ventures.change-status');
    Route::post('ventures/{id}/restore', [VentureController::class, 'restore'])->name('ventures.restore');

    Route::resource('clients', ClientController::class)->names('clients');

    Route::resource('testimornials', TestimornialController::class)->names('testimornials');

    Route::resource('services', ServiceController::class)->names('services');
    Route::patch('services/{id}/change-status', [ServiceController::class, 'changeStatus'])->name('services.change-status');
    Route::post('services/{id}/restore', [ServiceController::class, 'restore'])->name('services.restore');

    Route::resource('our-work', OurWOrkController::class)->names('our-work');
    Route::patch('our-work/{id}/change-status', [OurWOrkController::class, 'changeStatus'])->name('our-work.change-status');
    Route::post('our-work/{id}/restore', [OurWOrkController::class, 'restore'])->name('our-work.restore');

    Route::resource('careers', CareerController::class)->names('careers');
    Route::patch('careers/{id}/change-status', [CareerController::class, 'changeStatus'])->name('careers.change-status');
    Route::post('careers/{id}/restore', [CareerController::class, 'restore'])->name('careers.restore');

    Route::get('enquiry', [EnquiryController::class, 'index'])->name('enquiry.index');
    Route::get('enquiry/{id}', [EnquiryController::class, 'show'])->name('enquiry.show');

    Route::get('subscribers', [HomeController::class, 'getSubscribers'])->name('subscribers.index');

    Route::get('seo', [SeoController::class, 'index'])->name('seo.index');
    Route::put('seo', [SeoController::class, 'update'])->name('seo.update');

    Route::get('site-translations', [SiteTranslationController::class, 'index'])->name('site-translations.index');
    Route::put('site-translations', [SiteTranslationController::class, 'update'])->name('site-translations.update');

    Route::get('sitemap', function () {
        SiteMapGenerate::dispatch();
        return redirect()->route('dashboard')->with('success', 'Sitemap generated successfully');
    })->name('sitemap');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

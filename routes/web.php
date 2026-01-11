<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OurWOrkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VentureController;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->group(function () {

    // Home
    Route::get('/', 'home')->name('home');

    // Blog
    Route::get('/blog', 'showBlog')->name('blog');
    Route::get('/blog/{uuid}/{slug}', 'BlogDetails')->name('blog-details');

    // Careers
    Route::get('/careers', 'showCareers')->name('show-careers');
    Route::get('/careers/{id}', 'showCareerDetails')->name('show-career-details');

    // Our Works
    Route::get('/our-works', 'showOurWork')->name('our-work');
    Route::get('/our-works/{id}', 'showOurWorkDetails')->name('our-work-details');

    // Services
    Route::get('/services', 'showServices')->name('services');
    Route::get('/services/{id}', 'showServiceDetails')->name('service-details');

    // Ventures
    Route::get('/ventures', 'showVentures')->name('ventures');

    // Work With Us
    Route::get('/work-with-us', 'showWorkWithUs')->name('work-with-us');

    // Subscribe
    Route::post('/subscribe', 'Subscribe')->name('user.subscribe');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/technology', function () {
    return view('technology');
})->name('technology');

Route::post('/enquiry', [EnquiryController::class, 'store'])->name('enquiry.store');

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('bloglist', BlogsController::class)->names('bloglist');
    Route::patch('bloglist/{id}/change-status', [BlogsController::class, 'changeStatus'])->name('bloglist.change-status');
    Route::post('bloglist/{id}/restore', [BlogsController::class, 'restore'])->name('bloglist.restore');

    Route::resource('ventures', VentureController::class)->names('ventures');
    Route::patch('ventures/{id}/change-status', [VentureController::class, 'changeStatus'])->name('ventures.change-status');
    Route::post('ventures/{id}/restore', [VentureController::class, 'restore'])->name('ventures.restore');

    Route::resource('clients', ClientController::class)->names('clients');

    Route::resource('services', ServiceController::class)->names('services');
    Route::patch('services/{id}/change-status', [ServiceController::class, 'changeStatus'])->name('services.change-status');
    Route::post('services/{id}/restore', [ServiceController::class, 'restore'])->name('services.restore');

    Route::resource('our-work',OurWOrkController::class)->names('our-work');
    Route::patch('our-work/{id}/change-status', [OurWOrkController::class, 'changeStatus'])->name('our-work.change-status');
    Route::post('our-work/{id}/restore', [OurWOrkController::class, 'restore'])->name('our-work.restore');


    Route::resource('careers', CareerController::class)->names('careers');
    Route::patch('careers/{id}/change-status', [CareerController::class, 'changeStatus'])->name('careers.change-status');
    Route::post('careers/{id}/restore', [CareerController::class, 'restore'])->name('careers.restore');

    Route::get('enquiry', [EnquiryController::class, 'index'])->name('enquiry.index');
    Route::get('enquiry/{id}', [EnquiryController::class, 'show'])->name('enquiry.show');

    Route::get('subscribers', [HomeController::class, 'getSubscribers'])->name('subscribers.index');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

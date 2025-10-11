<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\EnquireController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VentureController;
use Illuminate\Support\Facades\Route;

Route::get('/blog', function () {
    return view('blog');
});
Route::get('/', function () {
    return view('home');
});
Route::get('/careers', [HomeController::class, 'showCareers'])->name('show-careers');
Route::get('/careers/{id}', [HomeController::class, 'showCareerDetails'])->name('show-career-details');
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/our-works', function () {
    return view('our-works');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/technology', function () {
    return view('technology');
});
Route::get('/ventures', [HomeController::class, 'showVentures']);
Route::get('/work-with-us', function () {
    return view('work-with-us');
});

Route::post('/enquiry', [EnquireController::class, 'store'])->name('enquiry.store');

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

    Route::resource('careers', CareerController::class)->names('careers');
    Route::patch('careers/{id}/change-status', [CareerController::class, 'changeStatus'])->name('careers.change-status');
    Route::post('careers/{id}/restore', [CareerController::class, 'restore'])->name('careers.restore');

    Route::get('enquiry', [EnquireController::class, 'index'])->name('enquiry.index');
    Route::get('enquiry/{id}', [EnquireController::class, 'show'])->name('enquiry.show');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VentureController;
use Illuminate\Support\Facades\Route;

Route::get('/blog', function () {
    return view('blog');
});
Route::get('/', function () {
    return view('home');
});
Route::get('/careers', function () {
    return view('carrer');
});
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
Route::get('/ventures', function () {
    return view('ventures');
});
Route::get('/work-with-us', function () {
    return view('work-with-us');
});

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
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

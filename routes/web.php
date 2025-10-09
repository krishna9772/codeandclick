<?php

use Illuminate\Support\Facades\Route;

Route::get('/blogs', function () {
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


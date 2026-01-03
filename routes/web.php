<?php

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return view('admin.testsidebarandtopbar');
})->name('admin.dashboard');
// route news aseli 
Route::get('/news', function () {
    return view('front.news');
})->name('news');

Route::get('/news/{id}', function ($id) {
    return view('front.newsDetail');
})->name('news.detail');

// route atmin edit
Route::get('/admin/landingEdit', function () {
    return view('admin.adminLanding');
})->name('admin.landingEdit');

Route::get('/admin/newsManager', function () {
    return view('admin.adminNewsView');
})->name('admin.adminNewsView');

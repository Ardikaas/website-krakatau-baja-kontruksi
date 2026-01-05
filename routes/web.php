<?php

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return view('admin.adminLanding');
})->name('admin.landingEdit');
// route news aseli 
Route::get('/news', function () {
    return view('front.news');
})->name('news');

Route::get('/news/{id}', function ($id) {
    return view('front.newsDetail');
})->name('news.detail');

Route::get('/admin/newsEdit', function () {
    return view('admin.adminNewsView');
})->name('admin.adminNewsViews');

Route::get('/admin/addNews', function () {
    return view('admin.adminNewsAdd');
})->name('admin.adminNewsAdd');

Route::get('/admin/specificationsEdit', function () {
    return view('admin.adminSpecificationView');
})->name('admin.adminSpecificationView');

Route::get('/admin/addSpecifications', function () {
    return view('admin.adminSpecificationAdd');
})->name('admin.adminSpecificationAdd');

<?php

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// route atmin edit
Route::get('/admin/landingEdit', function () {
    return view('admin.adminLanding');
})->name('admin.landingEdit');

Route::get('/admin/newsEdit', function () {
    return view('admin.adminNewsView');
})->name('admin.adminNewsViews');

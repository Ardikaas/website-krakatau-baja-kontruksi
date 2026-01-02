<?php

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return view('admin.testsidebarandtopbar');
})->name('admin.dashboard');
// route atmin edit
Route::get('/admin/landingEdit', function () {
    return view('admin.adminLanding');
})->name('admin.landingEdit');

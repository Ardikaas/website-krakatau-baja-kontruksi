<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\WbsController as AdminWbsController;
use App\Http\Controllers\Admin\DocumentController as AdminDocumentController;
use App\Http\Controllers\Api\WbsController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return view('admin.adminLanding');
})->name('admin.landingEdit');

Route::get('/wbs', function () {
    return view('front.whistleBlowingSystem');
})->name('wbs');

Route::get('/contact', function () {
    return view('front.contact');
})->name('contact');

// route news aseli 
Route::get('/news', function () {
    return view('front.news');
})->name('news');

Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::post('/news/{id}/comment', [NewsController::class, 'storeComment'])->name('news.commentStore');


Route::get('/about', function () {
    return view('front.aboutus');
})->name('about');


Route::get('/admin/newsEdit', [AdminController::class, 'adminNewsView'])->name('admin.adminNewsViews');
Route::get('/admin/addNews', function () {
    return view('admin.adminNewsAdd');
})->name('admin.adminNewsAdd');
Route::post('/admin/addNews', [AdminController::class, 'storeNews'])->name('admin.adminNewsStore');
Route::delete('/admin/news/{id}', [AdminController::class, 'deleteNews'])->name('admin.news.delete');

Route::get('/admin/productEdit', function () {
    return view('admin.adminSpecificationView');
})->name('admin.adminSpecificationView');

Route::get('/admin/addProduct', function () {
    return view('admin.adminSpecificationAdd');
})->name('admin.adminSpecificationAdd');

Route::prefix('admin')->group(function () {
    Route::get('/wbs', [AdminWbsController::class, 'index'])
        ->name('admin.wbs.index');

    Route::get('/wbs/{id}', [AdminWbsController::class, 'show'])
        ->name('admin.wbs.show');
});

Route::get('/wbs/{id}/download', [WbsController::class, 'downloadEvidence'])
    ->name('api.wbs.download');

Route::get('/admin/aboutus', function () {
    return view('admin.adminAboutUs');
})->name('admin.aboutUs');

Route::get('/admin', [AdminDocumentController::class, 'adminLanding'])
    ->name('admin.landingEdit');

Route::post(
    '/admin/documents',
    [AdminDocumentController::class, 'store']
)->name('admin.documents.store');

Route::delete(
    '/admin/documents/{id}',
    [AdminDocumentController::class, 'destroy']
)->name('admin.documents.delete');
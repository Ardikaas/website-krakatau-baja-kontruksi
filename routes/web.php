<?php

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\WbsController as AdminWbsController;
use App\Http\Controllers\Admin\DocumentController as AdminDocumentController;
use App\Http\Controllers\Front\ProductController as FrontProductController;
use App\Http\Controllers\Api\WbsController;
use App\Http\Controllers\Admin\HeroBannerController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ContactController;


Route::get('/', [HomeController::class, 'index'])->name('home');

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

Route::post('/contact/send', [ContactController::class, 'send'])
    ->name('contact.send');

Route::get('/project', function () {
    return view('front.project');
})->name('project');
Route::get('/projectDetail', function () {
    return view('front.projectDetail');
})->name('projectDetail');


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

Route::get('/admin', [HeroBannerController::class, 'index'])
    ->name('admin.landingEdit');

Route::post(
    '/admin/documents',
    [AdminDocumentController::class, 'store']
)->name('admin.documents.store');

Route::delete(
    '/admin/documents/{id}',
    [AdminDocumentController::class, 'destroy']
)->name('admin.documents.delete');

Route::get('/product', [FrontProductController::class, 'index'])
    ->name('product');

Route::get('/product/{slug}', [FrontProductController::class, 'show'])
    ->name('product.detail');

Route::post(
    '/admin/hero-banners',
    [HeroBannerController::class, 'store']
)->name('admin.hero-banners.store');

Route::delete(
    '/admin/hero-banners/{id}',
    [HeroBannerController::class, 'destroy']
)->name('admin.hero-banners.destroy');

Route::get(
    '/admin/hero-banners/view/{filename}',
    [HeroBannerController::class, 'viewImage']
)->name('admin.hero-banners.view');

Route::post(
    '/admin/why-choose-us',
    [WhyChooseUsController::class, 'store']
)->name('admin.why-choose-us.store');

Route::delete(
    '/admin/why-choose-us/{id}',
    [WhyChooseUsController::class, 'destroy']
)->name('admin.why-choose-us.destroy');

Route::get(
    '/admin/why-choose-us/view/{filename}',
    [WhyChooseUsController::class, 'viewImage']
)->name('admin.why-choose-us.view');

Route::get('/admin/productEdit', [ProductController::class, 'index'])
    ->name('admin.product.index');

Route::get('/admin/addProduct', [ProductController::class, 'create'])
    ->name('admin.product.create');

Route::post('/admin/addProduct', [ProductController::class, 'store'])
    ->name('admin.product.store');

Route::get('/admin/product/{id}/edit', [ProductController::class, 'edit'])
    ->name('admin.product.edit');

Route::post('/admin/product/{id}', [ProductController::class, 'update'])
    ->name('admin.product.update');

Route::delete('/admin/product/{product}', [ProductController::class, 'destroy'])
    ->name('admin.product.delete');

Route::get(
    '/admin/product-image/{path}',
    [ProductController::class, 'viewImage']
)->where('path', '.*')
    ->name('admin.product.image');

Route::get('/product-image/{filename}', [ProductController::class, 'viewImage'])
    ->where('filename', '.*')
    ->name('product.image');
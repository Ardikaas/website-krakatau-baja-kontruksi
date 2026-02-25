<?php

use App\Http\Controllers\Admin\AboutHistoryController;
use App\Http\Controllers\Admin\AboutPeopleController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Front\AboutController;
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
use App\Http\Controllers\Admin\ProjectPageController;
use App\Http\Controllers\Front\ProjectController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\AdminAuthController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/wbs', function () {
    return view('front.whistleBlowingSystem');
})->name('wbs');

Route::get('/contact', function () {
    $sales = \App\Models\Sales::latest()->get();
    return view('front.contact', compact('sales'));
})->name('contact');

Route::get('/company-governance', function () {
    return view('front.compgov');
})->name('compgov');

Route::get('/subholding', function () {
    return view('front.subholding');
})->name('subholding');

// route news aseli 
Route::get('/news', function () {
    return view('front.news');
})->name('news');

Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::post('/news/{id}/comment', [NewsController::class, 'storeComment'])->name('news.commentStore');


Route::get('/about-us', [AboutController::class, 'about'])
    ->name('about');

Route::post('/contact/send', [ContactController::class, 'send'])
    ->name('contact.send');

Route::get('/projects', [ProjectController::class, 'index'])->name('front.projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('front.projects.show');

// ================================
// ADMIN ROUTES (No authentication for now)
// ================================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Admin routes (no middleware)
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');

    Route::resource('projects', ProjectPageController::class);

    // Product routes
    Route::get('/productEdit', [ProductController::class, 'index'])->name('product.index');
    Route::get('/addProduct', [ProductController::class, 'create'])->name('product.create');
    Route::post('/addProduct', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::get('/product-image/{path}', [ProductController::class, 'viewImage'])->where('path', '.*')->name('product.image');

    // About Us routes
    Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');
    Route::post('/aboutus/main-images', [AboutUsController::class, 'storeMainImage'])->name('aboutus.main-images.store');
    Route::delete('/aboutus/main-images/{image}', [AboutUsController::class, 'deleteMainImage'])->name('aboutus.main-images.delete');
    Route::post('/aboutus/history', [AboutHistoryController::class, 'store'])->name('aboutus.history.store');
    Route::delete('/aboutus/history/{history}', [AboutHistoryController::class, 'destroy'])->name('aboutus.history.delete');
    Route::get('/aboutus/people', [AboutPeopleController::class, 'index'])->name('aboutus.people.index');
    Route::post('/aboutus/people', [AboutPeopleController::class, 'store'])->name('aboutus.people.store');
    Route::delete('/aboutus/people/{person}', [AboutPeopleController::class, 'destroy'])->name('aboutus.people.delete');
    Route::post('/aboutus/section-image', [AboutUsController::class, 'storeSectionImage'])->name('aboutus.section-image.store');
    Route::delete('/aboutus/section-image/{key}', [AboutUsController::class, 'deleteSectionImage'])->name('aboutus.section-image.delete');

    // Sales routes
    Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');
    Route::post('/sales/store', [SalesController::class, 'store'])->name('sales.store');
    Route::delete('/sales/delete/{id}', [SalesController::class, 'destroy'])->name('sales.destroy');

    // News routes
    Route::get('/newsEdit', [AdminController::class, 'adminNewsView'])->name('adminNewsViews');
    Route::get('/addNews', function () {
        return view('admin.adminNewsAdd');
    })->name('adminNewsAdd');
    Route::post('/addNews', [AdminController::class, 'storeNews'])->name('adminNewsStore');
    Route::delete('/news/{id}', [AdminController::class, 'deleteNews'])->name('news.delete');
});

// Additional admin routes (non-protected)
// Removed duplicate routes to avoid conflicts

Route::prefix('admin')->group(function () {
    Route::get('/wbs', [AdminWbsController::class, 'index'])
        ->name('admin.wbs.index');

    Route::get('/wbs/{id}', [AdminWbsController::class, 'show'])
        ->name('admin.wbs.show');
});

Route::get('/wbs/{id}/download', [WbsController::class, 'downloadEvidence'])
    ->name('api.wbs.download');

// Removed duplicate route

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

// Public routes
Route::get('/product', [FrontProductController::class, 'index'])
    ->name('product');

Route::get('/product/{slug}', [FrontProductController::class, 'show'])
    ->name('product.detail');

Route::get('/product-image/{filename}', [ProductController::class, 'viewImage'])
    ->where('filename', '.*')
    ->name('product.image');

Route::get('/sales-image/{filename}', [SalesController::class, 'viewImage'])
    ->where('filename', '.*')
    ->name('sales.image');
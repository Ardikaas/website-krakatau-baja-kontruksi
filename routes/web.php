<?php

use App\Http\Controllers\Admin\AboutHistoryController;
use App\Http\Controllers\Admin\AboutPeopleController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
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

// ==========================================
// CPANEL HELPER ROUTES (No SSH/Terminal)
// ==========================================
Route::get('/cc', function() {
    Artisan::call('optimize:clear');
    return 'Cache Cleared! <br> <a href="/">Back to Home</a>';
});

Route::get('/artisan-migrate', function() {
    // Force is needed to run migrations in production
    Artisan::call('migrate', ['--force' => true]);
    return 'Migrate successful! Output: <br><pre>' . Artisan::output() . '</pre><br> <a href="/">Back to Home</a>';
});

Route::get('/artisan-migrate-fresh', function() {
    Artisan::call('migrate:fresh', ['--force' => true, '--seed' => true]);
    return 'Migrate Fresh & Seed successful! Output: <br><pre>' . Artisan::output() . '</pre><br> <a href="/">Back to Home</a>';
});

Route::get('/artisan-migrate-fresh-empty', function() {
    Artisan::call('migrate:fresh', ['--force' => true]);
    return 'Database Cleared (Empty Structure) successful! Output: <br><pre>' . Artisan::output() . '</pre><br> <a href="/">Back to Home</a>';
});

Route::get('/artisan-storage-link', function() {
    Artisan::call('storage:link');
    return 'Storage Linked! Output: <br><pre>' . Artisan::output() . '</pre><br> <a href="/">Back to Home</a>';
});

Route::get('/artisan-db-seed-admin', function() {
    Artisan::call('db:seed', [
        '--class' => 'AdminUserSeeder',
        '--force' => true
    ]);
    return 'Admin Seeding Done! <br> <a href="/admin/login">Go to Login</a>';
});

Route::get('/artisan-down', function() {
    // Secret bypass is set to 'admin-bypass'
    Artisan::call('down', [
        '--secret' => 'admin-bypass',
        '--refresh' => 15 // Refresh page every 15 seconds
    ]);
    return 'Maintenance Mode ON! <br> <b>Bypass Link:</b> <a href="'.url('/admin-bypass').'">Click here to Bypass</a> <br> <a href="/">Back to Home</a>';
});

Route::get('/artisan-up', function() {
    Artisan::call('up');
    return 'Maintenance Mode OFF! <br> <a href="/">Back to Home</a>';
});

// Route khusus untuk admin jika ingin bypass mode maintenance secara manual tanpa ke link secret
Route::get('/maintenance-bypass', function() {
    return redirect('/admin-bypass');
});

Route::get('/debug-url', function() {
    return [
        'APP_URL' => config('app.url'),
        'asset_image' => asset('images/logo.png'),
        'url_root' => url('/'),
        'current_host' => request()->getHost(),
        'is_https' => request()->secure(),
        'public_path' => public_path(),
        'base_path' => base_path(),
    ];
});

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');

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

Route::get('/about-us/cv/{id}', [AboutController::class, 'showCv'])
    ->name('front.cv.show');

Route::post('/contact/send', [ContactController::class, 'send'])
    ->name('contact.send');

Route::get('/projects', [ProjectController::class, 'index'])->name('front.projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('front.projects.show');

// ================================
// ADMIN ROUTES
// ================================
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth routes
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Protected admin routes
    Route::middleware(['admin.auth'])->group(function () {
        Route::get('/', [HeroBannerController::class, 'index'])->name('landingEdit');
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
        Route::post('/aboutus/section-image', [AboutUsController::class, 'storeSectionImage'])->name('aboutus.section-image.store');
        Route::delete('/aboutus/section-image/{key}', [AboutUsController::class, 'deleteSectionImage'])->name('aboutus.section-image.delete');
        Route::get('/aboutus/people', [AboutPeopleController::class, 'index'])->name('aboutus.people.index');
        Route::post('/aboutus/people', [AboutPeopleController::class, 'store'])->name('aboutus.people.store');
        Route::delete('/aboutus/people/{person}', [AboutPeopleController::class, 'destroy'])->name('aboutus.people.delete');

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

        // WBS routes
        Route::get('/wbs', [AdminWbsController::class, 'index'])->name('wbs.index');
        Route::get('/wbs/{id}', [AdminWbsController::class, 'show'])->name('wbs.show');

        // Hero Banners & Why Choose Us & Documents
        Route::get('/documents/{id}/download', [AdminDocumentController::class, 'download'])->name('documents.download');
        Route::post('/documents', [AdminDocumentController::class, 'store'])->name('documents.store');
        Route::delete('/documents/{id}', [AdminDocumentController::class, 'destroy'])->name('documents.delete');

        Route::post('/hero-banners', [HeroBannerController::class, 'store'])->name('hero-banners.store');
        Route::delete('/hero-banners/{id}', [HeroBannerController::class, 'destroy'])->name('hero-banners.destroy');

        Route::post('/why-choose-us', [WhyChooseUsController::class, 'store'])->name('why-choose-us.store');
        Route::delete('/why-choose-us/{id}', [WhyChooseUsController::class, 'destroy'])->name('why-choose-us.destroy');
    });
});


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
// About Us Image Bypasses
Route::get('/aboutus/view/{filename}', [App\Http\Controllers\Admin\AboutUsController::class, 'viewImage'])
    ->where('filename', '.*')
    ->name('admin.aboutus.view');

Route::get('/aboutus/history/view/{filename}', [App\Http\Controllers\Admin\AboutHistoryController::class, 'viewImage'])
    ->name('admin.aboutus.history.view');

Route::get('/aboutus/people/view/{filename}', [App\Http\Controllers\Admin\AboutPeopleController::class, 'viewImage'])
    ->name('admin.aboutus.people.view');

// Other Bypasses
Route::get('/why-choose-us/view/{filename}', [App\Http\Controllers\Admin\WhyChooseUsController::class, 'viewImage'])
    ->name('admin.why-choose-us.view');

Route::get('/hero-banners/view/{filename}', [App\Http\Controllers\Admin\HeroBannerController::class, 'viewImage'])
    ->name('admin.hero-banners.view');

// Project Image Bypass
Route::get('/projects/view/{filename}', [App\Http\Controllers\Admin\ProjectPageController::class, 'viewImage'])
    ->name('admin.projects.view');

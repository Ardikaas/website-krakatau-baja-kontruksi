<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HeroBannerController;
use App\Http\Controllers\Api\WhyChooseUsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/ping', function () {
  return response()->json(['status' => 'API OK']);
});

Route::get('/hero-banner', [HeroBannerController::class, 'index']);
Route::post('/hero-banner', [HeroBannerController::class, 'store']);
Route::delete('/hero-banner/{id}', [HeroBannerController::class, 'destroy']);
Route::get('/hero-banner/image/{filename}', [HeroBannerController::class, 'imageByName'])->where('filename', '.*');



Route::get('/why-choose-us', [WhyChooseUsController::class, 'index']);
Route::post('/why-choose-us', [WhyChooseUsController::class, 'store']);
Route::put('/why-choose-us/{id}', [WhyChooseUsController::class, 'update']);
Route::delete('/why-choose-us/{id}', [WhyChooseUsController::class, 'destroy']);

Route::get('/why-choose-us/image/{filename}', [WhyChooseUsController::class, 'imageByName'])->where('filename', '.*');

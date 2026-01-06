<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HeroBannerController;
use App\Http\Controllers\Api\WhyChooseUsController;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\HeroVideoController;

Route::get('/ping', function () {
  return response()->json(['status' => 'API OK']);
});

// Landing API
Route::get('/hero-banner', [HeroBannerController::class, 'index']);
Route::post('/hero-banner', [HeroBannerController::class, 'store']);
Route::delete('/hero-banner/{id}', [HeroBannerController::class, 'destroy']);
Route::get('/hero-banner/image/{filename}', [HeroBannerController::class, 'imageByName'])->where('filename', '.*');

Route::get('/why-choose-us', [WhyChooseUsController::class, 'index']);
Route::post('/why-choose-us', [WhyChooseUsController::class, 'store']);
Route::put('/why-choose-us/{id}', [WhyChooseUsController::class, 'update']);
Route::delete('/why-choose-us/{id}', [WhyChooseUsController::class, 'destroy']);
Route::get('/why-choose-us/image/{filename}', [WhyChooseUsController::class, 'imageByName'])->where('filename', '.*');

Route::get('/documents', [DocumentController::class, 'index']);
Route::post('/documents', [DocumentController::class, 'store']);
Route::get('/documents/download/{id}', [DocumentController::class, 'download']);
Route::delete('/documents/{id}', [DocumentController::class, 'destroy']);

Route::get('/hero-video', [HeroVideoController::class, 'index']);
Route::post('/hero-video', [HeroVideoController::class, 'store']);
Route::delete('/hero-video', [HeroVideoController::class, 'destroy']);
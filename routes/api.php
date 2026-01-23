<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HeroBannerController;
use App\Http\Controllers\Api\WhyChooseUsController;
use App\Http\Controllers\Api\DocumentController;
use App\Http\Controllers\Api\HeroVideoController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\NewsCommentController;
use App\Http\Controllers\Api\WbsController;
use App\Http\Controllers\Api\ProjectController;

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

Route::get('/news', [NewsController::class, 'index']);
Route::get('/news/{id}', [NewsController::class, 'show']);
Route::post('/news', [NewsController::class, 'store']);
Route::put('/news/{id}', [NewsController::class, 'update']);
Route::delete('/news/{id}', [NewsController::class, 'destroy']);
Route::get('/news/{id}/comments', [NewsCommentController::class, 'index']);
Route::post('/news/{id}/comments', [NewsCommentController::class, 'store']);
Route::delete('/comments/{id}', [NewsCommentController::class, 'destroy']);
Route::get('/news/image/{filename}', [NewsController::class, 'imageByName'])->where('filename', '.*');

Route::get('/wbs', [WbsController::class, 'index']);
Route::get('/wbs/{id}', [WbsController::class, 'show']);
Route::post('/wbs', [WbsController::class, 'store']);
Route::get('/wbs/{id}/download', [WbsController::class, 'downloadEvidence']);
Route::delete('/wbs/{id}', [WbsController::class, 'destroy']);

Route::apiResource('projects', ProjectController::class);

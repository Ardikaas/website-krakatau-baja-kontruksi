<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\ApiResponse;
use App\Models\HeroVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HeroVideoController extends Controller
{
    public function index()
    {
        $video = HeroVideo::latest()->first();

        return ApiResponse::success($video);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png|dimensions:width=250,height=258',
            'video_url' => 'required|url',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error(
                'Validasi gagal',
                422,
                $validator->errors()
            );
        }

        $old = HeroVideo::latest()->first();
        if ($old) {
            Storage::disk('public')->delete($old->thumbnail);
            $old->delete();
        }

        $path = $request->file('thumbnail')->store('hero-video', 'public');

        $video = HeroVideo::create([
            'thumbnail' => $path,
            'video_url' => $request->video_url,
        ]);

        return ApiResponse::success(
            $video,
            'Hero video berhasil disimpan',
            201
        );
    }

    public function destroy()
    {
        $video = HeroVideo::latest()->first();

        if (!$video) {
            return ApiResponse::error(
                'Hero video tidak ditemukan',
                404
            );
        }

        Storage::disk('public')->delete($video->thumbnail);
        $video->delete();

        return ApiResponse::success(
            null,
            'Hero video berhasil dihapus'
        );
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\ApiResponse;
use App\Models\HeroBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HeroBannerController extends Controller
{

    public function index()
    {
        $banners = HeroBanner::latest()->get();
        return ApiResponse::success($banners);
    }

    public function store(Request $request)
    {
        if (HeroBanner::count() >= 3) {
            return ApiResponse::error(
                'Hero banner maksimal 3 item',
                422
            );
        }

        $validator = Validator::make($request->all(), [
            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png',
                'dimensions:width=1920,height=730',
            ],
        ]);

        if ($validator->fails()) {
            return ApiResponse::error(
                'Validasi gagal',
                422,
                $validator->errors()
            );
        }

        $path = $request->file('image')->store('hero', 'public');

        $banner = HeroBanner::create([
            'image' => $path,
        ]);

        return ApiResponse::success(
            $banner,
            'Hero banner berhasil diupload',
            201
        );
    }

    public function destroy($id)
    {
        $banner = HeroBanner::find($id);

        if (!$banner) {
            return ApiResponse::error(
                'Hero banner tidak ditemukan',
                404
            );
        }

        Storage::disk('public')->delete($banner->image);
        $banner->delete();

        return ApiResponse::success(
            null,
            'Hero banner berhasil dihapus'
        );
    }

    public function imageByName($filename)
    {
        $path = 'hero/' . $filename;

        if (!Storage::disk('public')->exists($path)) {
            return ApiResponse::error('Gambar tidak ditemukan', 404);
        }

        $fullPath = storage_path('app/public/' . $path);

        return response()->file($fullPath, [
            'Content-Type' => mime_content_type($fullPath),
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }

}

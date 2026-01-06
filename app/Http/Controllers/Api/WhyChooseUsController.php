<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\ApiResponse;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WhyChooseUsController extends Controller
{
    public function index()
    {
        $data = WhyChooseUs::latest()->get();
        return ApiResponse::success($data);
    }

    public function store(Request $request)
    {
        if (WhyChooseUs::count() >= 6) {
            return ApiResponse::error(
                'Why Choose Us maksimal 6 item',
                422
            );
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error(
                'Validasi gagal',
                422,
                $validator->errors()
            );
        }

        $path = $request->file('image')->store('why', 'public');

        $item = WhyChooseUs::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path,
        ]);

        return ApiResponse::success(
            $item,
            'Why Choose Us berhasil ditambahkan',
            201
        );
    }

    public function update(Request $request, $id)
    {
        $item = WhyChooseUs::find($id);

        if (!$item) {
            return ApiResponse::error(
                'Data tidak ditemukan',
                404
            );
        }

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error(
                'Validasi gagal',
                422,
                $validator->errors()
            );
        }

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($item->image);
            $item->image = $request->file('image')->store('why', 'public');
        }

        if ($request->filled('title')) {
            $item->title = $request->title;
        }

        if ($request->filled('description')) {
            $item->description = $request->description;
        }

        $item->save();

        return ApiResponse::success(
            $item,
            'Why Choose Us berhasil diperbarui'
        );
    }

    public function destroy($id)
    {
        $item = WhyChooseUs::find($id);

        if (!$item) {
            return ApiResponse::error(
                'Data tidak ditemukan',
                404
            );
        }

        Storage::disk('public')->delete($item->image);
        $item->delete();

        return ApiResponse::success(
            null,
            'Why Choose Us berhasil dihapus'
        );
    }

    public function imageByName($filename)
    {
        $path = 'why/' . $filename;

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

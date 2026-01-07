<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\ApiResponse;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'author' => $item->author,
                'published_at' => $item->published_at,
                'image_url' => asset('storage/' . $item->image),
            ];
        });

        return ApiResponse::success($news);
    }

    public function show($id)
    {
        $news = News::with('comments')->find($id);

        if (!$news) {
            return ApiResponse::error('News tidak ditemukan', 404);
        }

        return ApiResponse::success([
            'id' => $news->id,
            'title' => $news->title,
            'author' => $news->author,
            'content' => $news->content,
            'published_at' => $news->published_at,
            'image_url' => asset('storage/' . $news->image),
            'comments' => $news->comments,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error('Validasi gagal', 422, $validator->errors());
        }

        $path = $request->file('image')->store('news', 'public');

        $news = News::create([
            'image' => $path,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'author' => $request->input('author'),
            'published_at' => now(),
        ]);

        return ApiResponse::success($news, 'News berhasil dibuat', 201);
    }

    public function update(Request $request, $id)
    {
        $news = News::find($id);

        if (!$news) {
            return ApiResponse::error('News tidak ditemukan', 404);
        }

        $validator = Validator::make($request->all(), [
            'image' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
            'author' => 'sometimes|required|string|max:100',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error('Validasi gagal', 422, $validator->errors());
        }

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($news->image);
            $news->image = $request->file('image')->store('news', 'public');
        }

        $news->update($request->only('title', 'content', 'author'));

        return ApiResponse::success($news, 'News berhasil diperbarui');
    }

    public function destroy($id)
    {
        $news = News::find($id);

        if (!$news) {
            return ApiResponse::error('News tidak ditemukan', 404);
        }

        Storage::disk('public')->delete($news->image);
        $news->delete();

        return ApiResponse::success(null, 'News berhasil dihapus');
    }

    public function imageByName($filename)
    {
        $path = 'news/' . $filename;

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

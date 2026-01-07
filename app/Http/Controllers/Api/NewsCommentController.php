<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\ApiResponse;
use App\Models\NewsComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsCommentController extends Controller
{
    public function index($newsId)
    {
        return ApiResponse::success(
            NewsComment::where('news_id', $newsId)->latest()->get()
        );
    }

    public function store(Request $request, $newsId)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'comment' => 'required|string',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error('Validasi gagal', 422, $validator->errors());
        }

        $comment = NewsComment::create([
            'news_id' => $newsId,
            'name' => $request->name,
            'comment' => $request->comment,
        ]);

        return ApiResponse::success($comment, 'Komentar berhasil ditambahkan', 201);
    }

    public function destroy($id)
    {
        $comment = NewsComment::find($id);

        if (!$comment) {
            return ApiResponse::error('Komentar tidak ditemukan', 404);
        }

        $comment->delete();

        return ApiResponse::success(null, 'Komentar berhasil dihapus');
    }
}

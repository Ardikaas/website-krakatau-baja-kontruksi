<?php

namespace App\Http\Controllers;

use App\Services\NewsService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function adminNewsView(NewsService $service)
  {
    $news = collect();

    try {
      $news = $service->adminList();
    } catch (\Throwable $e) {
    }

    return view('admin.adminNewsView', compact('news'));
  }
  public function storeNews(Request $request, NewsService $service)
  {
    $data = $request->validate([
      'title' => 'required|string|max:255',
      'author' => 'required|string|max:100',
      'content' => 'required|string',
      'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $service->store(
      [
        'title' => $data['title'],
        'author' => $data['author'],
        'content' => $data['content'],
      ],
      $request->file('image')
    );

    return response()->json([
      'message' => 'News berhasil ditambahkan'
    ]);
  }
  public function deleteNews(int $id, NewsService $service)
  {
    $news = $service->findById($id);

    if (!$news) {
      return back()->with('error', 'News tidak ditemukan');
    }

    $service->destroy($news);

    return back()->with('success', 'News berhasil dihapus');
  }

}

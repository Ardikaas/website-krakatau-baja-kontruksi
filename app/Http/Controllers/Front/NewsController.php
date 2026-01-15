<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
  public function show(int $id, NewsService $service)
  {
    $news = $service->show($id);

    if (!$news) {
      abort(404);
    }

    $news->image_url = url('/api/news/image/' . basename($news->image));
    $latestNews = $service->latest(4);
    $comments = $service->getComments($id);

    return view('front.newsDetail', compact(
      'news',
      'latestNews',
      'comments'
    ));
  }

  public function storeComment(int $id, Request $request, NewsService $service)
  {
    $validated = $request->validate([
      'name' => 'required|string|max:100',
      'email' => 'required|email',
      'message' => 'required|string',
    ]);

    $service->storeComment($id, [
      'name' => $validated['name'],
      'comment' => $validated['message'],
    ]);

    return back()->with('success', 'Comment berhasil ditambahkan');
  }
}

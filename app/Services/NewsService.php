<?php

namespace App\Services;

use App\Models\News;
use App\Models\NewsComment;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class NewsService
{
  public function index()
  {
    return News::latest()->get();
  }

  public function show(int $id): ?News
  {
    return News::with('comments')->find($id);
  }

  public function store(array $data, UploadedFile $image): News
  {
    $path = $image->store('news', 'public');

    return News::create([
      'image' => $path,
      'title' => $data['title'],
      'title_en' => $data['title_en'] ?? null,
      'content' => $data['content'],
      'content_en' => $data['content_en'] ?? null,
      'author' => $data['author'],
      'published_at' => now(),
    ]);
  }

  public function update(News $news, array $data, ?UploadedFile $image = null): News
  {
    if ($image) {
      Storage::disk('public')->delete($news->image);
      $news->image = $image->store('news', 'public');
    }

    $news->update($data);
    return $news;
  }

  public function destroy(News $news): void
  {
    Storage::disk('public')->delete($news->image);
    $news->delete();
  }

  public function latest(int $limit = 4)
  {
    return News::orderBy('published_at', 'desc')
      ->limit($limit)
      ->get()
      ->map(function (News $item) {
        $item->image_url = url('/api/news/image/' . basename($item->image));
        return $item;
      });
  }

  public function adminList()
  {
    return News::orderBy('published_at', 'desc')
      ->get()
      ->map(function (News $item) {
        return (object) [
          'id' => $item->id,
          'title' => $item->title,
          'author' => $item->author,
          'published_at' => $item->published_at,
          'image_url' => url('/api/news/image/' . basename($item->image)),
        ];
      });
  }

  public function getComments(int $newsId)
  {
    return NewsComment::where('news_id', $newsId)
      ->latest()
      ->get();
  }

  public function storeComment(int $newsId, array $data)
  {
    return NewsComment::create([
      'news_id' => $newsId,
      'name' => $data['name'],
      'comment' => $data['comment'],
    ]);
  }

  public function findById(int $id)
  {
    return News::find($id);
  }

}

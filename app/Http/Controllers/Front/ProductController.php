<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
  public function index()
  {
    $products = Product::orderByDesc('is_top')
      ->orderBy('sort_order')
      ->latest()
      ->paginate(9);

    $categories = Product::select('category')
      ->distinct()
      ->pluck('category');

    return view('front.product', compact('products', 'categories'));
  }

  public function show($slug)
  {
    $product = Product::where('slug', $slug)->firstOrFail();

    $images = $product->thumbnail ?? [];

    $sales = \App\Models\Sales::where('categories', 'like', '%' . $product->category . '%')->take(2)->get();

    return view('front.productDetail', compact('product', 'images', 'sales'));
  }

  public function viewImage($path)
  {
    if (!Storage::disk('public')->exists($path)) {
      abort(404, 'Image not found');
    }

    $fullPath = storage_path('app/public/' . $path);

    return response()->file($fullPath, [
      'Content-Type' => mime_content_type($fullPath),
      'Cache-Control' => 'public, max-age=86400',
    ]);
  }
}

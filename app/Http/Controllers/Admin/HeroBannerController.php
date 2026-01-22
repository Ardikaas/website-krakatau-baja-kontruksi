<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\WhyChooseUs;
use App\Models\Document;

class HeroBannerController extends Controller
{
  public function index()
  {
    $banners = HeroBanner::all();
    $bannerCount = $banners->count();

    $whyChooseUs = WhyChooseUs::all();
    $whyChooseUsCount = $whyChooseUs->count();

    $documents = Document::all();

    return view('admin.adminLanding', compact(
      'banners',
      'bannerCount',
      'whyChooseUs',
      'whyChooseUsCount',
      'documents'
    ));
  }

  public function viewImage($filename)
  {
    $path = 'hero-banners/' . $filename;

    if (!Storage::disk('public')->exists($path)) {
      abort(404);
    }

    $fullPath = storage_path('app/public/' . $path);

    return response()->file($fullPath, [
      'Content-Type' => mime_content_type($fullPath),
      'Cache-Control' => 'public, max-age=86400',
    ]);
  }

  public function store(Request $request)
  {
    if (HeroBanner::count() >= 3) {
      return back()->withErrors([
        'limit' => 'Hero banner maksimal 3. Hapus salah satu terlebih dahulu.'
      ]);
    }

    $request->validate([
      'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $path = $request->file('image')->store('hero-banners', 'public');

    HeroBanner::create([
      'image' => $path,
    ]);

    return back()->with('success', 'Hero banner berhasil ditambahkan');
  }


  public function destroy($id)
  {
    $banner = HeroBanner::findOrFail($id);

    Storage::disk('public')->delete($banner->image);
    $banner->delete();

    return back()->with('success', 'Hero banner berhasil dihapus');
  }
}

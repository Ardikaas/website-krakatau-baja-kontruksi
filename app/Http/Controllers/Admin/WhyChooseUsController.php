<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhyChooseUsController extends Controller
{
  public function store(Request $request)
  {
    if (WhyChooseUs::count() >= 6) {
      return back()->withErrors([
        'limit' => 'Why Choose Us maksimal 6 poin. Hapus salah satu terlebih dahulu.'
      ]);
    }

    $request->validate([
      'title' => 'required|string|max:255',
      'description' => 'required|string',
      'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $path = $request->file('image')->store('why-choose-us', 'public');

    WhyChooseUs::create([
      'title' => $request->title,
      'description' => $request->description,
      'image' => $path,
    ]);

    return back()->with('success', 'Point berhasil ditambahkan');
  }


  public function update(Request $request, $id)
  {
    $item = WhyChooseUs::findOrFail($id);

    $data = $request->only(['title', 'description']);

    if ($request->hasFile('image')) {
      Storage::disk('public')->delete($item->image);
      $data['image'] = $request->file('image')->store('why-choose-us', 'public');
    }

    $item->update($data);

    return back()->with('success', 'Point berhasil diperbarui');
  }

  public function destroy($id)
  {
    $item = WhyChooseUs::findOrFail($id);

    Storage::disk('public')->delete($item->image);
    $item->delete();

    return back()->with('success', 'Point berhasil dihapus');
  }
  public function viewImage($filename)
  {
    $path = 'why-choose-us/' . $filename;

    if (!Storage::disk('public')->exists($path)) {
      abort(404);
    }

    $fullPath = storage_path('app/public/' . $path);

    return response()->file($fullPath, [
      'Content-Type' => mime_content_type($fullPath),
      'Cache-Control' => 'public, max-age=86400',
    ]);
  }
}

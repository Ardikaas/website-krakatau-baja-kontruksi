<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutHistory;
use App\Models\AboutMainImage;
use App\Models\AboutPerson;
use App\Models\AboutSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function index()
    {
        return view('admin.adminAboutUs', [
            'mainImages' => AboutMainImage::all(),
            'histories' => AboutHistory::latest()->get(),
            'companyImage' => AboutSetting::where('key', 'company_image')->first(),
            'structureImage' => AboutSetting::where('key', 'structure_image')->first(),
            'direksi' => AboutPerson::where('type', 'direksi')->get(),
            'komisaris' => AboutPerson::where('type', 'komisaris')->get(),
        ]);
    }

    public function storeMainImage(Request $request)
    {
        if (AboutMainImage::count() >= 3) {
            return back()->withErrors([
                'main_images' => 'Maximum 3 images allowed.'
            ]);
        }

        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $path = $request
            ->file('image')
            ->store('about/main', 'public');

        AboutMainImage::create([
            'image' => $path
        ]);

        return back();
    }

    public function deleteMainImage(AboutMainImage $image)
    {
        if ($image->image && Storage::disk('public')->exists($image->image)) {
            Storage::disk('public')->delete($image->image);
        }

        $image->delete();

        return back();
    }

    public function storeSectionImage(Request $request)
    {
        $request->validate([
            'key' => 'required|in:company_image,structure_image',
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $key = $request->input('key');

        // Delete old image if exists
        $existing = AboutSetting::where('key', $key)->first();
        if ($existing && $existing->value && Storage::disk('public')->exists($existing->value)) {
            Storage::disk('public')->delete($existing->value);
        }

        $path = $request->file('image')->store('about/sections', 'public');

        AboutSetting::updateOrCreate(
            ['key' => $key],
            ['value' => $path]
        );

        return response()->json(['success' => true, 'path' => $path]);
    }

    public function deleteSectionImage($key)
    {
        if (!in_array($key, ['company_image', 'structure_image'])) {
            return response()->json(['error' => 'Invalid key'], 422);
        }

        $setting = AboutSetting::where('key', $key)->first();

        if ($setting) {
            if ($setting->value && Storage::disk('public')->exists($setting->value)) {
                Storage::disk('public')->delete($setting->value);
            }
            $setting->delete();
        }

        return response()->json(['success' => true]);
    }

    public function viewImage($filename)
    {
        // Decode filename if it contains paths
        $path = str_replace(['..', '///'], '', $filename);

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

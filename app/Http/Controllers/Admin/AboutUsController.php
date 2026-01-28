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
}

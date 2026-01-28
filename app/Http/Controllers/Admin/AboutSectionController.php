<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutSectionController extends Controller
{
    public function companyInfo()
    {
        $items = AboutSection::where('section_type', 'company_info')->get();

        return view('admin.adminAboutUs', compact('items'));
    }

    public function storeCompanyInfo(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if (AboutSection::where('section_type', 'company_info')->count() >= 3) {
            return back()->with('error', 'Company Info maksimal 3 data');
        }

        $image = $request->file('image')->store('about/company', 'public');

        AboutSection::create([
            'section_type' => 'company_info',
            'image' => $image,
        ]);

        return back()->with('success', 'Company Info berhasil ditambahkan');
    }

    public function history()
    {
        $items = AboutSection::where('section_type', 'history')
            ->orderBy('year')
            ->get();

        return view('admin.about.history', compact('items'));
    }

    public function storeHistory(Request $request)
    {
        $request->validate([
            'year' => 'required|string|max:10',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if (AboutSection::where('section_type', 'history')->count() >= 7) {
            return back()->with('error', 'History maksimal 7 data');
        }

        $image = $request->file('image')->store('about/history', 'public');

        AboutSection::create([
            'section_type' => 'history',
            'year' => $request->year,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image,
        ]);

        return back()->with('success', 'History berhasil ditambahkan');
    }

    public function visionMission()
    {
        $data = AboutSection::where('section_type', 'vision_mission')->first();
        return view('admin.about.vision_mission', compact('data'));
    }

    public function storeVisionMission(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if (AboutSection::where('section_type', 'vision_mission')->exists()) {
            return back()->with('error', 'Vision & Mission hanya boleh 1 data');
        }

        $image = $request->file('image')->store('about/vision', 'public');

        AboutSection::create([
            'section_type' => 'vision_mission',
            'description' => $request->description,
            'image' => $image,
        ]);

        return back()->with('success', 'Vision & Mission berhasil ditambahkan');
    }

    public function corporateStructure()
    {
        $data = AboutSection::where('section_type', 'corporate_structure')->first();
        return view('admin.about.corporate_structure', compact('data'));
    }

    public function storeCorporateStructure(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if (AboutSection::where('section_type', 'corporate_structure')->exists()) {
            return back()->with('error', 'Struktur organisasi hanya boleh 1 data');
        }

        $image = $request->file('image')->store('about/structure', 'public');

        AboutSection::create([
            'section_type' => 'corporate_structure',
            'image' => $image,
        ]);

        return back()->with('success', 'Struktur organisasi berhasil ditambahkan');
    }

    public function team()
    {
        $items = AboutSection::where('section_type', 'team_member')->get();
        return view('admin.about.team', compact('items'));
    }

    public function storeTeam(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'category' => 'required|in:direksi,dewan komisaris',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $image = $request->file('image')->store('about/team', 'public');

        AboutSection::create([
            'section_type' => 'team_member',
            'name' => $request->name,
            'position' => $request->position,
            'category' => $request->category,
            'image' => $image,
        ]);

        return back()->with('success', 'Team member berhasil ditambahkan');
    }

    public function destroy(AboutSection $about)
    {
        if ($about->image) {
            Storage::disk('public')->delete($about->image);
        }

        $about->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }

    public function viewImage($path)
    {
        $path = str_replace('..', '', $path);

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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPerson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutPeopleController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type', 'direksi');
        $people = AboutPerson::where('type', $type)->get();
        return response()->json($people);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:direksi,komisaris',
            'name' => 'required|string',
            'position' => 'required|string',
            'position_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'summary' => 'nullable|string',
            'summary_en' => 'nullable|string',
            'previous_jobs' => 'nullable|string',
            'previous_jobs_en' => 'nullable|string',
            'full_body_image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('about/people', 'public');
        }

        if ($request->hasFile('full_body_image')) {
            $data['full_body_image'] = $request->file('full_body_image')->store('about/people', 'public');
        }

        $person = AboutPerson::create($data);

        return response()->json([
            'message' => 'Person created successfully',
            'data' => $person
        ], 201);
    }

    public function destroy(AboutPerson $person)
    {
        if ($person->image && Storage::disk('public')->exists($person->image)) {
            Storage::disk('public')->delete($person->image);
        }

        if ($person->full_body_image && Storage::disk('public')->exists($person->full_body_image)) {
            Storage::disk('public')->delete($person->full_body_image);
        }

        $person->delete();

        return response()->json([
            'message' => 'Person deleted successfully'
        ]);
    }

    public function viewImage($filename)
    {
        $path = 'about/people/' . $filename;

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

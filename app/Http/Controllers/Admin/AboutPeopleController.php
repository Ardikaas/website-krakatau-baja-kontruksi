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
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'career_history' => 'nullable|json',
            'organization_history' => 'nullable|json',
            'full_body_image' => 'nullable|image|mimes:jpg,jpeg,png',
            'summary' => 'nullable|string',
            'summary_en' => 'nullable|string',
            'cv_mode' => 'nullable|string|in:summary_only,points_only,both'
        ]);

        if (isset($data['career_history'])) {
            $data['career_history'] = json_decode($data['career_history'], true);
        }
        if (isset($data['organization_history'])) {
            $data['organization_history'] = json_decode($data['organization_history'], true);
        }

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

    public function update(Request $request, AboutPerson $person)
    {
        $data = $request->validate([
            'type' => 'required|in:direksi,komisaris',
            'name' => 'required|string',
            'position' => 'required|string',
            'position_en' => 'nullable|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'career_history' => 'nullable|json',
            'organization_history' => 'nullable|json',
            'full_body_image' => 'nullable|image|mimes:jpg,jpeg,png',
            'summary' => 'nullable|string',
            'summary_en' => 'nullable|string',
            'cv_mode' => 'nullable|string|in:summary_only,points_only,both'
        ]);

        if (isset($data['career_history'])) {
            $data['career_history'] = json_decode($data['career_history'], true);
        }
        if (isset($data['organization_history'])) {
            $data['organization_history'] = json_decode($data['organization_history'], true);
        }

        if ($request->hasFile('image')) {
            if ($person->image && Storage::disk('public')->exists($person->image)) {
                Storage::disk('public')->delete($person->image);
            }
            $data['image'] = $request->file('image')->store('about/people', 'public');
        }

        if ($request->hasFile('full_body_image')) {
             if ($person->full_body_image && Storage::disk('public')->exists($person->full_body_image)) {
                Storage::disk('public')->delete($person->full_body_image);
            }
            $data['full_body_image'] = $request->file('full_body_image')->store('about/people', 'public');
        }

        $person->update($data);

        return response()->json([
            'message' => 'Person updated successfully',
            'data' => $person
        ]);
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

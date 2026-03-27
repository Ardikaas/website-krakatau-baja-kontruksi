<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectPageController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.adminProjectView', compact('projects'));
    }

    public function create()
    {
        $project = new Project();
        return view('admin.adminProjectForm', compact('project'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'title_en'       => 'nullable|string|max:255',
            'what'           => 'required|string|max:255',
            'what_en'        => 'nullable|string|max:255',
            'location'       => 'required|string|max:255',
            'location_en'    => 'nullable|string|max:255',
            'description'    => 'required|string',
            'description_en' => 'nullable|string',
            'new_images'     => 'required|array|min:1|max:3',
            'new_images.*'   => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $images = [];
        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $file) {
                $images[] = $file->store('projects', 'public');
            }
        }

        $validated['images'] = $images;
        unset($validated['new_images']);

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil ditambahkan!');
    }

    public function edit(Project $project)
    {
        return view('admin.adminProjectForm', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'title_en'       => 'nullable|string|max:255',
            'what'           => 'required|string|max:255',
            'what_en'        => 'nullable|string|max:255',
            'location'       => 'required|string|max:255',
            'location_en'    => 'nullable|string|max:255',
            'description'    => 'required|string',
            'description_en' => 'nullable|string',
            'new_images'     => 'nullable|array|max:3',
            'new_images.*'   => 'image|mimes:jpg,jpeg,png|max:2048',
            'existing_images'=> 'nullable|array|max:3',
            'existing_images.*' => 'string',
        ]);

        // Start with existing images the user chose to keep
        $keepImages = $request->input('existing_images', []);
        $oldImages = $project->images ?? [];

        // Delete removed images from storage
        foreach ($oldImages as $oldImage) {
            if (!in_array($oldImage, $keepImages)) {
                Storage::disk('public')->delete($oldImage);
            }
        }

        // Add new uploaded images
        $newImages = [];
        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $file) {
                $newImages[] = $file->store('projects', 'public');
            }
        }

        $allImages = array_merge($keepImages, $newImages);

        // Ensure max 3 images
        $allImages = array_slice($allImages, 0, 3);

        $validated['images'] = $allImages;
        unset($validated['new_images'], $validated['existing_images']);

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diperbarui!');
    }

    public function destroy(Project $project)
    {
        // Delete all images from storage
        if ($project->images) {
            foreach ($project->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $project->delete();
        return back()->with('success', 'Project berhasil dihapus!');
    }

    public function viewImage($filename)
    {
        $path = 'projects/' . $filename;

        if (!Storage::disk('public')->exists($path)) {
            abort(404);
        }

        $fullPath = Storage::disk('public')->path($path);

        return response()->file($fullPath, [
            'Content-Type' => mime_content_type($fullPath),
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }
}

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
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'desc' => 'required|string',
            'scope' => 'nullable|string',
            'location' => 'nullable|string',
            'client' => 'nullable|string',
            'date' => 'nullable|date',
            'category' => 'nullable|string',
            'challenge' => 'nullable|string',
            'solutions' => 'required|array',
            'solutions.*.title' => 'required|string',
            'solutions.*.desc' => 'required|string',
        ]);

        // Upload image
        $path = $request->file('image')->store('projects', 'public');

        Project::create([
            'title' => $request->title,
            'image' => $path,
            'desc' => $request->desc,
            'scope' => $request->scope,
            'location' => $request->location,
            'client' => $request->client,
            'date' => $request->date,
            'category' => $request->category,
            'challenge' => $request->challenge,
            'solutions' => $request->solutions, // harusnya sudah cast ke json di model
        ]);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project berhasil ditambahkan');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.form', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
            'desc' => 'required|string',
            'scope' => 'nullable|string',
            'location' => 'nullable|string',
            'client' => 'nullable|string',
            'date' => 'nullable|date',
            'category' => 'nullable|string',
            'challenge' => 'nullable|string',
            'solutions' => 'required|array',
            'solutions.*.title' => 'required|string',
            'solutions.*.desc' => 'required|string',
        ]);

        $data = $request->only([
            'title', 'desc', 'scope', 'location', 'client',
            'date', 'category', 'challenge', 'solutions'
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($project->image);
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project berhasil diperbarui');
    }

    public function destroy(Project $project)
    {
        Storage::disk('public')->delete($project->image);
        $project->delete();

        return back()->with('success', 'Project berhasil dihapus');
    }

    public function viewImage($filename)
    {
        $path = 'projects/' . $filename;

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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectPageController extends Controller
{
    public function index() {
        $projects = Project::latest()->get();
        return view('admin.adminProjectView', compact('projects'));
    }

    public function create() {
        $project = new Project();
        return view('admin.adminProjectForm', compact('project'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
            'scope_of_work' => 'required|string',
            'challenges' => 'required|string',
            'solutions' => 'required|array|min:2',
            'solutions.*.title' => 'required|string',
            'solutions.*.description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil ditambahkan!');
    }

    public function edit(Project $project) {
        return view('admin.adminProjectForm', compact('project'));
    }

    public function update(Request $request, Project $project) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
            'scope_of_work' => 'required|string',
            'challenges' => 'required|string',
            'solutions' => 'required|array|min:2',
            'solutions.*.title' => 'required|string',
            'solutions.*.description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($project->image) Storage::disk('public')->delete($project->image);
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diperbarui!');
    }

    public function destroy(Project $project) {
        if ($project->image) Storage::disk('public')->delete($project->image);
        $project->delete();
        return back()->with('success', 'Project berhasil dihapus!');
    }
}

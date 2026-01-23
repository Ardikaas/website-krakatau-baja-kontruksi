<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ApiResponse;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects
     */
    public function index()
    {
        $projects = Project::latest()->get()->map(function ($p) {
            return [
                'id' => $p->id,
                'title' => $p->title,
                'category' => $p->category,
                'client' => $p->client,
                'location' => $p->location,
                'date' => $p->date,
                'image' => $p->image ? asset('storage/' . $p->image) : null,
            ];
        });

        return ApiResponse::success($projects->toArray());
    }

    /**
     * Display a single project
     */
    public function show($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return ApiResponse::error('Project tidak ditemukan', 404);
        }

        return ApiResponse::success([
            'id' => $project->id,
            'title' => $project->title,
            'description' => $project->description,
            'scope' => $project->scope,
            'location' => $project->location,
            'client' => $project->client,
            'date' => $project->date,
            'category' => $project->category,
            'challenges' => $project->challenges,
            'solutions' => $project->solutions, // sudah array
            'image' => $project->image ? asset('storage/' . $project->image) : null,
        ]);
    }

    /**
     * Store a newly created project
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'scope' => 'required|string',
            'location' => 'required|string',
            'client' => 'required|string',
            'date' => 'required|date',
            'category' => 'required|string',
            'challenges' => 'required|string',
            'solutions' => 'required|array|min:1',
            'solutions.*.title' => 'required|string',
            'solutions.*.description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error('Validasi gagal', 422, $validator->errors());
        }

        $imagePath = $request->file('image')->store('projects', 'public');

        $project = Project::create([
            'image' => $imagePath,
            'title' => $request->title,
            'description' => $request->description,
            'scope' => $request->scope,
            'location' => $request->location,
            'client' => $request->client,
            'date' => $request->date,
            'category' => $request->category,
            'challenges' => $request->challenges,
            'solutions' => $request->solutions,
        ]);

        return ApiResponse::success($project, 'Project berhasil dibuat', 201);
    }

    /**
     * Update an existing project
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($id);

        if (!$project) {
            return ApiResponse::error('Project tidak ditemukan', 404);
        }

        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'scope' => 'sometimes|required|string',
            'location' => 'sometimes|required|string',
            'client' => 'sometimes|required|string',
            'date' => 'sometimes|required|date',
            'category' => 'sometimes|required|string',
            'challenges' => 'sometimes|required|string',
            'solutions' => 'sometimes|required|array|min:1',
            'solutions.*.title' => 'required_with:solutions|string',
            'solutions.*.description' => 'required_with:solutions|string',
        ]);

        if ($validator->fails()) {
            return ApiResponse::error('Validasi gagal', 422, $validator->errors());
        }

        // Hapus image lama jika ada
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $project->image = $request->file('image')->store('projects', 'public');
        }

        // Update field lain
        $project->update($request->only([
            'title',
            'description',
            'scope',
            'location',
            'client',
            'date',
            'category',
            'challenges',
            'solutions',
        ]));

        return ApiResponse::success($project, 'Project berhasil diperbarui');
    }

    /**
     * Delete a project
     */
    public function destroy($id)
    {
        $project = Project::find($id); // ✅ pastikan model tunggal

        if (!$project) {
            return ApiResponse::error('Project tidak ditemukan', 404);
        }

        // Hapus image jika ada
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return ApiResponse::success(null, 'Project berhasil dihapus');
    }
}

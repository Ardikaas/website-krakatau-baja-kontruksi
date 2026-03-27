<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        $sales = \App\Models\Sales::where('categories', 'like', '%Project%')->take(2)->get();

        return view('front.project', compact('projects', 'sales'));
    }

    public function show(Project $project)
    {
        $sales = \App\Models\Sales::where('categories', 'like', '%Project%')->take(2)->get();

        return view('front.projectDetail', compact('project', 'sales'));
    }
}

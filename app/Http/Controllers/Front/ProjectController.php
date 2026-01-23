<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('date', 'desc')->get();

        return view('front.project', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('front.projectDetail', compact('project'));
    }
}

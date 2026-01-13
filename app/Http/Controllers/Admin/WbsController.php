<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WbsReport;

class WbsController extends Controller
{
    public function index()
    {
        $reports = WbsReport::latest()->get();

        return view('admin.adminWBS', compact('reports'));
    }

    public function show($id)
    {
        $report = WbsReport::findOrFail($id);

        return view('admin.adminWBSDetails', compact('report'));
    }
}

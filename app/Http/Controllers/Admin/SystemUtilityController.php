<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

class SystemUtilityController extends Controller
{
    public function index()
    {
        if (!config('app.debug')) {
            abort(404);
        }
        return view('admin.adminUtilities');
    }

    public function runCommand($command)
    {
        if (!config('app.debug')) {
            abort(404);
        }

        try {
            switch ($command) {
                case 'optimize-clear':
                    Artisan::call('optimize:clear');
                    return back()->with('success', 'Cache Cleared! ' . Artisan::output());
                case 'migrate':
                    Artisan::call('migrate', ['--force' => true]);
                    return back()->with('success', 'Migration Successful! ' . Artisan::output());
                case 'storage-link':
                    Artisan::call('storage:link');
                    return back()->with('success', 'Storage Linked! ' . Artisan::output());
                default:
                    return back()->with('error', 'Unknown Command');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}

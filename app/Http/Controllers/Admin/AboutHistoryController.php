<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutHistory;
use Illuminate\Http\Request;

class AboutHistoryController extends Controller
{
    public function store(Request $request)
    {
        if (AboutHistory::count() >= 7) {
            return back()->withErrors([
                'history' => 'Maximum 7 history items allowed.'
            ]);
        }

        $data = $request->validate([
            'title' => 'required|string',
            'title_en' => 'nullable|string',
            'year' => 'nullable|string',
            'description' => 'required|string',
            'description_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request
                ->file('image')
                ->store('about/history', 'public');
        }

        AboutHistory::create($data);

        return back()->with('success', 'History added successfully');
    }

    public function destroy(AboutHistory $history)
    {
        if ($history->image && \Storage::disk('public')->exists($history->image)) {
            \Storage::disk('public')->delete($history->image);
        }

        $history->delete();

        return back()->with('success', 'History deleted');
    }

    public function viewImage($filename)
    {
        $path = 'about/history/' . $filename;

        if (!\Storage::disk('public')->exists($path)) {
            abort(404);
        }

        $fullPath = storage_path('app/public/' . $path);

        return response()->file($fullPath, [
            'Content-Type' => mime_content_type($fullPath),
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }
}

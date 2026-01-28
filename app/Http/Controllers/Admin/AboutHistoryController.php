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
            'year' => 'nullable|string',
            'description' => 'required|string',
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
}

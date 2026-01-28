<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPerson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutPeopleController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type', 'direksi');
        $people = AboutPerson::where('type', $type)->get();
        return response()->json($people);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:direksi,komisaris',
            'name' => 'required|string',
            'position' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('about/people', 'public');
        }

        $person = AboutPerson::create($data);

        return response()->json([
            'message' => 'Person created successfully',
            'data' => $person
        ], 201);
    }

    public function destroy(AboutPerson $person)
    {
        if ($person->image && Storage::disk('public')->exists($person->image)) {
            Storage::disk('public')->delete($person->image);
        }

        $person->delete();

        return response()->json([
            'message' => 'Person deleted successfully'
        ]);
    }
}

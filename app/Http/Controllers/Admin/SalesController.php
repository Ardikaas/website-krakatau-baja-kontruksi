<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::latest()->get();
        $categories = Product::select('category')->distinct()->pluck('category');
        
        // Add 'Project' manually so admin can select it for Project Sales Contacts
        if (!$categories->contains('Project')) {
            $categories->push('Project');
        }

        return view('admin.adminSalesView', compact('sales', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contact' => 'required|regex:/^[0-9]{9,12}$/',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png',
            'categories' => 'required|string|min:1'
        ]);

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')
                ->store('sales', 'public');
        }

        Sales::create([
            'name' => $request->name,
            'contact' => '0' . $request->contact,
            'photo' => $photoPath,
            'categories' => $request->categories
        ]);

        return redirect()->back()
            ->with('success', 'Sales berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $sales = Sales::findOrFail($id);

        if (
            $sales->photo &&
            \Storage::exists('public/' . $sales->photo)
        ) {

            \Storage::delete('public/' . $sales->photo);
        }

        $sales->delete();

        return redirect()->back()
            ->with('success', 'Sales berhasil dihapus');
    }

    public function viewImage($path)
    {
        if (!Storage::disk('public')->exists($path)) {
            abort(404, 'Image not found');
        }

        $fullPath = storage_path('app/public/' . $path);

        return response()->file($fullPath, [
            'Content-Type' => mime_content_type($fullPath),
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }
}

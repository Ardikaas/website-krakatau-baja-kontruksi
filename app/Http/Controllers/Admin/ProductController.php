<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private function generateUniqueSlug($name, $ignoreId = null)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        while (
            Product::where('slug', $slug)
                ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function index()
    {
        $products = Product::latest()->paginate(6);
        return view('admin.adminSpecificationView', compact('products'));
    }

    public function create()
    {
        return view('admin.adminSpecificationAdd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'description_en' => 'nullable|string',
            'images' => 'required|array|min:1|max:3',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',
            'spec_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = Product::create([
            'category' => $request->category,
            'name' => $request->name,
            'name_en' => $request->name_en,
            'slug' => $this->generateUniqueSlug($request->name),
            'description' => $request->description,
            'description_en' => $request->description_en,
        ]);

        $imagePaths = [];

        foreach ($request->file('images') as $image) {
            $imagePaths[] = $image->store('product/images', 'public');
        }

        $product->thumbnail = $imagePaths;

        if ($request->hasFile('spec_image')) {
            $product->spec_image = $request->file('spec_image')
                ->store('product/spec', 'public');
        }

        $product->save();

        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Product berhasil ditambahkan');
    }


    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'description_en' => 'nullable|string',

            'images' => 'nullable|array|max:3',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',

            'spec_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // update basic fields
        $product->category = $request->category;
        $product->name = $request->name;
        $product->name_en = $request->name_en;
        $product->description = $request->description;
        $product->description_en = $request->description_en;

        if ($product->isDirty('name')) {
            $product->slug = $this->generateUniqueSlug(
                $request->name,
                $product->id
            );
        }

        // === PRODUCT IMAGES (MAX 3) ===
        if ($request->hasFile('images')) {

            if ($product->thumbnail) {
                foreach ($product->thumbnail as $oldImage) {
                    Storage::disk('public')->delete($oldImage);
                }
            }

            $newImages = [];
            foreach ($request->file('images') as $image) {
                $newImages[] = $image->store('product/images', 'public');
            }

            $product->thumbnail = $newImages;
        }

        if ($request->hasFile('spec_image')) {

            if ($product->spec_image) {
                Storage::disk('public')->delete($product->spec_image);
            }

            $product->spec_image = $request->file('spec_image')
                ->store('product/spec', 'public');
        }

        $product->save();

        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Product berhasil diperbarui');
    }

    public function destroy(Product $product)
    {
        if ($product->thumbnail) {
            foreach ($product->thumbnail as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        if ($product->spec_image) {
            Storage::disk('public')->delete($product->spec_image);
        }

        $product->delete();

        return redirect()->route('admin.product.index')
            ->with('success', 'Product berhasil dihapus');
    }

    public function viewImage($path)
    {
        $path = str_replace('..', '', $path);

        if (!Storage::disk('public')->exists($path)) {
            abort(404);
        }

        $fullPath = storage_path('app/public/' . $path);

        return response()->file($fullPath, [
            'Content-Type' => mime_content_type($fullPath),
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }
}

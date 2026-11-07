<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminBrandController extends Controller
{
    // Brand List
    public function index()
    {
        $brands = Brand::latest()->get();

        return view('admin.brand.index', compact('brands'));
    }

    // Create Form
    public function create()
    {
        return view('admin.brand.create');
    }

    // Store Brand
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Generate slug
        $validated['slug'] = Str::slug($validated['name']);

        // Check unique slug
        $originalSlug = $validated['slug'];
        $count = 1;

        while (Brand::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $count++;
        }

        // Image Upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('brands', 'public');
        }

        $brand = new Brand();
        $brand->fill($validated);
        $brand->save();

        return redirect()
            ->route('admin.brand.index')
            ->with('success', 'Brand created successfully.');
    }

    // Edit Form
    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);

        return view('admin.brand.edit', compact('brand'));
    }

    // Update Brand
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $brand = Brand::findOrFail($id);

        // Generate slug
        $slug = Str::slug($validated['name']);

        $originalSlug = $slug;
        $count = 1;

        while (
            Brand::where('slug', $slug)
                ->where('id', '!=', $brand->id)
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $count++;
        }

        $validated['slug'] = $slug;

        // Image Update
        if ($request->hasFile('image')) {

            // Delete old image
            if ($brand->image) {
                Storage::disk('public')->delete($brand->image);
            }

            // Upload new image
            $validated['image'] = $request->file('image')
                ->store('brands', 'public');
        }

        $brand->fill($validated);
        $brand->save();

        return redirect()
            ->route('admin.brand.index')
            ->with('success', 'Brand updated successfully.');
    }

    // Delete Brand
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);

        // Delete Image
        if ($brand->image) {
            Storage::disk('public')->delete($brand->image);
        }

        $brand->delete();

        return redirect()
            ->route('admin.brand.index')
            ->with('success', 'Brand deleted successfully.');
    }
}

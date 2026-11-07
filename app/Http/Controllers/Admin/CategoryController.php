<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Category List
    public function index()
    {
        $categories = Category::latest()->get();

        return view('admin.category.index', compact('categories'));
    }

    // Create Form
    public function create()
    {
        return view('admin.category.create');
    }

    // Store Category
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

          $slug = Str::slug($request->name);
        $validated['slug'] = $slug;

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('categories', 'public');
        }

        $category = new Category();
        $category->fill($validated);
        $category->save();

        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Category created successfully.');
    }

    // Edit Form
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    // Update Category
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug,' . $category->id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $slug = Str::slug($request->name);
        $validated['slug'] = $slug;

        // Upload New Image
        if ($request->hasFile('image')) {

            // Delete Old Image
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }

            $validated['image'] = $request->file('image')
                ->store('categories', 'public');
        }

        $category->fill($validated);
        $category->save();

        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Category updated successfully.');
    }

    // Delete Category
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Category deleted successfully.');
    }
}

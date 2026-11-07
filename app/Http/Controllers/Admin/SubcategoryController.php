<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    // Subcategory List
    public function index()
    {
        $subcategories = SubCategory::with('category')
            ->latest()
            ->get();

        return view('admin.subcategory.index', compact('subcategories'));
    }

    // Create Form
    public function create()
    {
        $categories = Category::latest()->get();

        return view('admin.subcategory.create', compact('categories'));
    }

    // Store Subcategory
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
        ]);

         $slug = Str::slug($request->name);
        $validated['slug'] = $slug;

       

        $subcategory = new SubCategory();
        $subcategory->fill($validated);
        $subcategory->save();

        return redirect()
            ->route('admin.subcategory.index')
            ->with('success', 'Subcategory created successfully.');
    }

    // Edit Form
    public function edit(string $id)
    {
        $subcategory = SubCategory::findOrFail($id);

        $categories = Category::latest()->get();

        return view('admin.subcategory.edit', compact(
            'subcategory',
            'categories'
        ));
    }

    // Update Subcategory
    public function update(Request $request, $id)
    {
        $subcategory = SubCategory::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'required',
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
           
        ]);

        $slug = Str::slug($request->name);
        $validated['slug'] = $slug;

       

        $subcategory->fill($validated);
        $subcategory->save();

        return redirect()
            ->route('admin.subcategory.index')
            ->with('success', 'Subcategory updated successfully.');
    }

    // Delete Subcategory
    public function destroy(string $id)
    {
        $subcategory = SubCategory::findOrFail($id);

      

        $subcategory->delete();

        return redirect()
            ->route('admin.subcategory.index')
            ->with('success', 'Subcategory deleted successfully.');
    }
}

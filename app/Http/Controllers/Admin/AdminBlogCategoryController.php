<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Illuminate\Support\Str;

class AdminBlogCategoryController extends Controller
{
    // Blog Category List
    public function index()
    {
        $blogCategories = BlogCategory::latest()->get();

        return view('admin.blog_category.index', compact('blogCategories'));
    }

    // Create Form
    public function create()
    {
        return view('admin.blog_category.create');
    }

    // Store Blog Category
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $validated['slug'] = Str::slug($request->name);

        $category = new BlogCategory();
        $category->fill($validated);
        $category->save();

        return redirect()
            ->route('admin.blog_category.index')
            ->with('success', 'Blog Category created successfully.');
    }

    // Edit Form
    public function edit(string $id)
    {
        $blogCategory = BlogCategory::findOrFail($id);

        return view('admin.blog_category.edit', compact('blogCategory'));
    }

    // Update Blog Category
  // Update Blog Category
public function update(Request $request, string $id)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $validated['slug'] = Str::slug($request->name);

    $category = BlogCategory::findOrFail($id);
    $category->fill($validated);
    $category->save();

    return redirect()
        ->route('admin.blog_category.index')
        ->with('success', 'Blog Category updated successfully.');
}

    // Delete Blog Category
    public function destroy(string $id)
    {
        $blogCategory = BlogCategory::findOrFail($id);

        $blogCategory->delete();

        return redirect()
            ->route('admin.blog_category.index')
            ->with('success', 'Blog Category deleted successfully.');
    }
}

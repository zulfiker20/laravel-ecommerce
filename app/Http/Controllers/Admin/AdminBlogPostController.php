<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminBlogPostController extends Controller
{
    // Blog Post List
    public function index()
    {
        $blogPosts = BlogPost::with('category')
            ->latest()
            ->get();

        return view('admin.blog_post.index', compact('blogPosts'));
    }

    // Create Form
    public function create()
    {
        $blogcategory = BlogCategory::latest()->get();

        return view('admin.blog_post.create', compact('blogcategory'));
    }

    // Store Blog Post
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('blog_posts', 'public');
        }
        $validated['slug'] = Str::slug($request->title);

        $blogPost = new BlogPost();
        $blogPost->fill($validated);
        $blogPost->save();

        return redirect()
            ->route('admin.blog_post.index')
            ->with('success', 'Blog Post created successfully.');
    }

    // Edit Form
    public function edit(string $id)
    {
        $blogPost = BlogPost::findOrFail($id);

        $blogcategory = BlogCategory::latest()->get();

        return view('admin.blog_post.edit', compact(
            'blogPost',
            'blogcategory'
        ));
    }

    // Update Blog Post
    public function update(Request $request, $id)
    {
        $blogPost = BlogPost::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($request->title);

        // New Image Upload
        if ($request->hasFile('image')) {

            // Delete Old Image
            if ($blogPost->image) {
                Storage::disk('public')->delete($blogPost->image);
            }

            // Store New Image
            $validated['image'] = $request->file('image')
                ->store('blog_posts', 'public');
        }

        // Update Data
        $blogPost->fill($validated);
        $blogPost->save();

        return redirect()
            ->route('admin.blog_post.index')
            ->with('success', 'Blog Post updated successfully.');
    }

    // Delete Blog Post
    public function destroy(string $id)
    {
        $blogPost = BlogPost::findOrFail($id);

        // Delete Image
        if ($blogPost->image) {
            Storage::disk('public')->delete($blogPost->image);
        }

        // Delete Blog Post
        $blogPost->delete();

        return redirect()
            ->route('admin.blog_post.index')
            ->with('success', 'Blog Post deleted successfully.');
    }
}

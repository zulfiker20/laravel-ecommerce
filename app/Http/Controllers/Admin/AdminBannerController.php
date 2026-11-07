<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class AdminBannerController extends Controller
{
    // Banner List
    public function index()
    {
        $banners = Banner::latest()->get();

        return view('admin.banner.index', compact('banners'));
    }

    // Create Form
    public function create()
    {
        return view('admin.banner.create');
    }

    // Store Banner
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'nullable|string|max:255',
            'short_title' => 'nullable|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('banners', 'public');
        }

        $banner = new Banner();
        $banner->fill($validated);
        $banner->save();

        return redirect()
            ->route('admin.banner.index')
            ->with('success', 'Banner created successfully.');
    }

    // Edit Form
    public function edit(string $id)
    {
        $banner = Banner::findOrFail($id);

        return view('admin.banner.edit', compact('banner'));
    }

    // Update Banner
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'       => 'nullable|string|max:255',
            'short_title' => 'nullable|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $banner = Banner::findOrFail($id);

        if ($request->hasFile('image')) {

            // Delete old image
            if ($banner->image) {
                Storage::disk('public')->delete($banner->image);
            }

            // Upload new image
            $validated['image'] = $request->file('image')
                ->store('banners', 'public');
        }

        $banner->fill($validated);
        $banner->save();

        return redirect()
            ->route('admin.banner.index')
            ->with('success', 'Banner updated successfully.');
    }

    // Delete Banner
    public function destroy(string $id)
    {
        $banner = Banner::findOrFail($id);

        if ($banner->image) {
            Storage::disk('public')->delete($banner->image);
        }

        $banner->delete();

        return redirect()
            ->route('admin.banner.index')
            ->with('success', 'Banner deleted successfully.');
    }
}
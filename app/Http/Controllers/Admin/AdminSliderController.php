<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class AdminSliderController extends Controller
{
    // Slider List
    public function index()
    {
        $sliders = Slider::latest()->get();

        return view('admin.slider.index', compact('sliders'));
    }

    // Create Form
    public function create()
    {
        return view('admin.slider.create');
    }

    // Store Slider
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'url'   => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('sliders', 'public');
        }

        $slider = new Slider();
        $slider->fill($validated);
        $slider->save();

        return redirect()
            ->route('admin.slider.index')
            ->with('success', 'Slider created successfully.');
    }

    // Edit Form
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);

        return view('admin.slider.edit', compact('slider'));
    }

    // Update Slider
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'url'   => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $slider = Slider::findOrFail($id);

        if ($request->hasFile('image')) {

            // Delete old image
            if ($slider->image) {
                Storage::disk('public')->delete($slider->image);
            }

            // Upload new image
            $validated['image'] = $request->file('image')
                ->store('sliders', 'public');
        }

        $slider->fill($validated);
        $slider->save();

        return redirect()
            ->route('admin.slider.index')
            ->with('success', 'Slider updated successfully.');
    }

    // Delete Slider
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);

        if ($slider->image) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        return redirect()
            ->route('admin.slider.index')
            ->with('success', 'Slider deleted successfully.');
    }
}


<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Division;

class AdminDistrictController extends Controller
{
    // District List
    public function index()
    {
        $districts = District::with('division')->latest()->get();
        return view('admin.district.index', compact('districts'));
    }

    // Create Form
    public function create()
    {
        $divisions = Division::latest()->get();

        return view('admin.district.create', compact('divisions'));
    }

    // Store District
    public function store(Request $request)
    {
        $validated = $request->validate([
            'division_id' => 'required|exists:divisions,id',
            'district_name' => 'required|string|max:255',
        ]);

        $district = new District();
        $district->fill($validated);
        $district->save();

        return redirect()
            ->route('admin.district.index')
            ->with('success', 'District created successfully.');
    }

    // Edit Form
    public function edit(string $id)
    {
        $district = District::findOrFail($id);

        $divisions = Division::latest()->get();

        return view('admin.district.edit', compact('district', 'divisions'));
    }

    // Update District
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'division_id' => 'required|exists:divisions,id',
            'district_name' => 'required|string|max:255',
        ]);

        $district = District::findOrFail($id);

        $district->fill($validated);
        $district->save();

        return redirect()
            ->route('admin.district.index')
            ->with('success', 'District updated successfully.');
    }

    // Delete District
    public function destroy(string $id)
    {
        $district = District::findOrFail($id);

        $district->delete();

        return redirect()
            ->route('admin.district.index')
            ->with('success', 'District deleted successfully.');
    }
}
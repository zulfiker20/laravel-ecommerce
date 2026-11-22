<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;

class AdminDivisionController extends Controller
{
    // Division List
    public function index()
    {
        $divisions = Division::latest()->get();

        return view('admin.division.index', compact('divisions'));
    }

    // Create Form
    public function create()
    {
        return view('admin.division.create');
    }

    // Store Division
    public function store(Request $request)
    {
        $validated = $request->validate([
            'division_name' => 'required|string|max:255|unique:divisions,division_name',
        ]);

        $division = new Division();
        $division->fill($validated);
        $division->save();

        return redirect()
            ->route('admin.division.index')
            ->with('success', 'Division created successfully.');
    }

    // Edit Form
    public function edit(string $id)
    {
        $division = Division::findOrFail($id);

        return view('admin.division.edit', compact('division'));
    }

    // Update Division
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'division_name' => 'required|string|max:255|unique:divisions,division_name,' . $id,
        ]);

        $division = Division::findOrFail($id);

        $division->fill($validated);
        $division->save();

        return redirect()
            ->route('admin.division.index')
            ->with('success', 'Division updated successfully.');
    }

    // Delete Division
    public function destroy(string $id)
    {
        $division = Division::findOrFail($id);

        $division->delete();

        return redirect()
            ->route('admin.division.index')
            ->with('success', 'Division deleted successfully.');
    }
}


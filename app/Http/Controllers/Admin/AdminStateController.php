<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Division;
use App\Models\District;

class AdminStateController extends Controller
{
    // State List
    public function index()
    {
        $states = State::with(['division', 'district'])
            ->latest()
            ->get();

        return view('admin.state.index', compact('states'));
    }

    // Create Form
    public function create()
    {
        $divisions = Division::latest()->get();
        $districts = District::latest()->get();

        return view('admin.state.create', compact(
            'divisions',
            'districts'
        ));
    }

    // Store State
    public function store(Request $request)
    {
        $validated = $request->validate([
            'division_id' => 'required|exists:divisions,id',
            'district_id' => 'required|exists:districts,id',
            'state_name' => 'required|string|max:255',
        ]);

        State::create($validated);

        return redirect()
            ->route('admin.state.index')
            ->with('success', 'State created successfully.');
    }

    // Edit Form
    public function edit(string $id)
    {
        $state = State::findOrFail($id);

        $divisions = Division::latest()->get();
        $districts = District::latest()->get();

        return view('admin.state.edit', compact(
            'state',
            'divisions',
            'districts'
        ));
    }

    // Update State
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'division_id' => 'required|exists:divisions,id',
            'district_id' => 'required|exists:districts,id',
            'state_name' => 'required|string|max:255',
        ]);

        $state = State::findOrFail($id);

        $state->fill($validated);
        $state->save();

        return redirect()
            ->route('admin.state.index')
            ->with('success', 'State updated successfully.');
    }

    // Delete State
    public function destroy(string $id)
    {
        $state = State::findOrFail($id);

        $state->delete();

        return redirect()
            ->route('admin.state.index')
            ->with('success', 'State deleted successfully.');
    }
}


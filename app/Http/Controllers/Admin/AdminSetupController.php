<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminSetupController extends Controller
{
    // User List
    public function index()
    {
        $users = User::where('role', 'admin')->latest()->get();

        return view('admin.user.index', compact('users'));
    }

    // Create Form
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    // Store User
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|exists:roles,id',
            'status' => 'required|in:active,inactive',
            'photo' => 'nullable|image|max:2048',
        ]);

        $user = new User();

        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = $request->status;

        if ($request->hasFile('photo')) {
            $user->photo = $request->file('photo')
                ->store('users', 'public');
        }

        $user->save();

        // Role ID দিয়ে Role খুঁজে বের করা
        $role = Role::findById($request->role, 'web');

        // Assign Role
        $user->assignRole($role);

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User created successfully.');
    }

    // Edit Form
    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);

        $roles = Role::all();

        return view('admin.user.edit', compact('user', 'roles'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validation
        $request->validate([
            'username' => 'required|unique:users,username,' . $id,
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'role' => 'required|exists:roles,id',
            'status' => 'required|in:active,inactive',
            'photo' => 'nullable|image|max:2048',
        ]);

        // Update User Information
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->status = $request->status;

        // Password Update
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Photo Update
        if ($request->hasFile('photo')) {
            $user->photo = $request->file('photo')
                ->store('users', 'public');
        }

        $user->save();

        // Find Role By ID
        $role = Role::findById($request->role, 'web');

        // Update User Role
        $user->syncRoles([$role]);

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User updated successfully.');
    }


    // // Delete User
   public function destroy($id)
{
    $user = User::findOrFail($id);

    // Remove User Roles
    $user->syncRoles([]);

    // Delete User
    $user->delete();

    return redirect()
        ->route('admin.user.index')
        ->with('success', 'User deleted successfully.');
}
}

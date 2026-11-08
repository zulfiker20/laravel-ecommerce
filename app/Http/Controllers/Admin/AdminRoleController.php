<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminRoleController extends Controller
{
    // Permission List
    public function index()
    {
        $permissions = Permission::latest()->get();

        return view('admin.permission.index', compact('permissions'));
    }

    // Create Permission Page
    public function create()
    {
        return view('admin.permission.create');
    }

    // Store Permission
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        return redirect()
            ->route('admin.permission.index')
            ->with('success', 'Permission created successfully!');
    }

    // Edit Permission Page
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('admin.permission.edit', compact('permission'));
    }

    // Update Permission
    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $permission->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        return redirect()
            ->route('admin.permission.index')
            ->with('success', 'Permission updated successfully!');
    }

    // Delete Permission
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);

        $permission->delete();

        return redirect()
            ->route('admin.permission.index')
            ->with('success', 'Permission deleted successfully!');
    }

      public function roleIndex()
    {
        $roles = Role::latest()->get();

        return view('admin.role.index', compact('roles'));
    }

    // Create Role Page
    public function roleCreate()
    {
        $roles = Role::get();

        return view('admin.role.create', compact('roles'));
    }

    // Store Role
    public function roleStore(Request $request)
    {

        $role = Role::create([
            'name' => $request->name,
        ]);
        return redirect()
            ->route('admin.role.index')
            ->with('success', 'Role created successfully!');
    }

    // Edit Role Page
    public function roleEdit($id)
    {
        $role = Role::findOrFail($id);


        return view('admin.role.edit', compact('role',));
    }

    // Update Role
    public function roleUpdate(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $role->update([
            'name' => $request->name,
        ]);


        return redirect()
            ->route('admin.role.index')
            ->with('success', 'Role updated successfully!');
    }

    // Delete Role
    public function roleDestroy($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        return redirect()
            ->route('admin.role.index')
            ->with('success', 'Role deleted successfully!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

    // roles permissions
    public function AllRoleCreate()
    {
        $roles = Role::get();
        $permissions = Permission::get();
        $permission_groups = User::getpermissionGroups();

        return view('admin.role.all-create', compact('roles', 'permissions', 'permission_groups'));
    }

    public function AllRoleIndex()
    {
        $roles = Role::latest()->get();

        return view('admin.role.all-index', compact('roles'));
    }

    public function AllRoleStore(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        foreach ($request->permissions as $item) {

            $data = [
                'role_id' => $request->role_id,
                'permission_id' => $item,
            ];

            DB::table('role_has_permissions')->insert($data);
        }

        return redirect()
            ->route('admin.all.role.index')
            ->with('success', 'Permissions assigned to role successfully!');
    }
    public function AllRoleEdit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::get();
        $permission_groups = User::getpermissionGroups();

        return view('admin.role.all-edit', compact('role', 'permissions', 'permission_groups'));
    }

    public function AllRoleUpdate(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $request->validate([
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        // Remove existing permissions for the role
        DB::table('role_has_permissions')->where('role_id', $role->id)->delete();

        // Assign new permissions to the role
        foreach ($request->permissions as $item) {
            $data = [
                'role_id' => $role->id,
                'permission_id' => $item,
            ];

            DB::table('role_has_permissions')->insert($data);
        }

        return redirect()
            ->route('admin.all.role.index')
            ->with('success', 'Permissions updated for role successfully!');
    }
    public function AllRoleDestroy($id)
    {
        $role = Role::findOrFail($id);

        // Remove existing permissions for the role
        DB::table('role_has_permissions')->where('role_id', $role->id)->delete();

        // Delete the role
        $role->delete();

        return redirect()
            ->route('admin.all.role.index')
            ->with('success', 'Role and its permissions deleted successfully!');
    }
}

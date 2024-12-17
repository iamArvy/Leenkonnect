<?php

namespace App\Http\Controllers\Admin\Access;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        $data = [
            'title' => 'Roles',
            'roles' => $roles,
            'permissions' => $permissions
        ];
        return inertia('Admin/Access/Roles', $data);
    }

    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);
        $role->syncPermissions($request->permissions);
        return redirect()->back()->with('success', 'Role created successfully');
    }

    public function update(Request $request,Role $role)
    {
        $role->syncPermissions($request->permissions);
        return redirect()->back()->with('success', 'Role updated successfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->with('success', 'Role deleted successfully');
    }
}

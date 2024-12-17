<?php

namespace App\Http\Controllers\Admin\Access;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $u = request()->query('u') ?? null;
        $r = request()->query('r') ?? null;
        $filters = [
            'u' =>$u,
            'r' => $r
        ];

        $query = User::with('roles')
        ->whereHas('roles')
        ->latest() ?? null;

        if ($u) {
            $query->where('name', 'LIKE', "%{$u}%");
        }

        if($r){
            $query->whereHas('roles', function($q) use ($r){
                $q->where('name', 'LIKE', "%{$r}%");
            });
        }

        $users = $query->paginate(10)->withQueryString();
        $roles = Role::all();
        $data = [
            'title' => 'Users',
            'users' => $users,
            'roles' => $roles,
            'filters' => $filters
        ];
        return inertia('Admin/Access/Users', $data);
    }

    public function create()
    {
        $roles = Role::all();
        $data = [
            'title' => 'Create User',
            'roles' => $roles
        ];
        return inertia('Admin/Access/CreateUser', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make(strtolower($request->first_name)),
        ]);

        $user->assignRole($request->role);

        return back()->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'roles' => $roles
        ];
        return inertia('Admin/Access/EditUser', $data);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required'
        ]);

        $user->update([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
        ]);

        $user->syncRoles($request->role);

        return back()->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        // $ids = request()->input('ids') ?? null;
        // foreach ($ids as $id) {
        //     $user = User::find($id);
            $user->delete();
        // }
        return back()->with('success', 'User deleted successfully');
    }

    public function addRole()
    {
        // Retrieve the user IDs and the role from the request
        $ids = request()->input('ids') ?? [];
        $role = request()->input('role');

        // Validate the inputs
        if (empty($ids) || !$role) {
            return back()->with('error', 'User IDs and role are required.');
        }

        // Loop through the users and sync the new role
        foreach ($ids as $id) {
            $user = User::find($id);
            if ($user) {
                $user->syncRoles($role); // Replaces all existing roles with the new one
            }
        }

        return back()->with('success', 'Role updated successfully for the selected users.');
    }

}

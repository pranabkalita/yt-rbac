<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn('name', ['admin'])->orderBy('id')->get();

        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3'
        ]);

        Role::create($validated);

        return to_route('admin.roles.index')->with('message', 'New Role Created.');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('admin.role.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => 'required|min:3'
        ]);

        $role->update($validated);

        return to_route('admin.roles.index')->with('message', 'Role Updated.');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return to_route('admin.roles.index')->with('message', 'Role Deleted.');
    }

    public function permissions(Request $request, Role $role)
    {
        $role->permissions()->sync($request->permissions);

        return back()->with('message', 'Permissions assigned to the Role.');
    }
}

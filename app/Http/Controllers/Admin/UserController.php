<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all()->except(auth()->id());

        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role_id' => 'required|integer'
        ]);

        $user->update($validated);

        return to_route('admin.users.index')->with('message', 'User has been updated !');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return to_route('admin.users.index')->with('message', 'User has been deleted !');
    }
}

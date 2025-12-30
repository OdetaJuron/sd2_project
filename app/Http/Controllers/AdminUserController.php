<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(): View
    {

        $users = User::with('roles')->orderBy('id', 'asc')->get();

        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    public function edit(int $id): View
    {
        $user = User::with('roles')->findOrFail($id);

        $allRoles = Role::orderBy('name', 'asc')->get();

        return view('admin.users.edit', [
            'user' => $user,
            'allRoles' => $allRoles,
        ]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'roles' => 'nullable|array',
            'roles.*' => 'integer',
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->save();

        $roleIds = $validatedData['roles'] ?? [];
        $user->roles()->sync($roleIds);

        return redirect()->route('admin.users.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'is_admin' => 'nullable|boolean',
        ]);

        // Only super admin can create admins
        $isAdmin = 0;
        if (auth()->user()->is_super_admin && $request->is_admin) {
            $isAdmin = 1;
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $isAdmin,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        // Prevent editing super admin unless current user is super admin
        if ($user->is_super_admin && !auth()->user()->is_super_admin) {
            abort(403, 'You cannot edit the super admin.');
        }

        // Prevent regular admins from editing other admins
        if ($user->is_admin && !auth()->user()->is_super_admin) {
            abort(403, 'Only super admin can edit other admins.');
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Prevent editing super admin unless current user is super admin
        if ($user->is_super_admin && !auth()->user()->is_super_admin) {
            abort(403, 'You cannot edit the super admin.');
        }

        // Prevent regular admins from editing other admins
        if ($user->is_admin && !auth()->user()->is_super_admin) {
            abort(403, 'Only super admin can edit other admins.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'is_admin' => 'nullable|boolean',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        // Only super admin can change is_admin
        if (auth()->user()->is_super_admin) {
            $user->is_admin = $request->is_admin ?? 1;
        }

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        // Cannot delete super admin
        if ($user->is_super_admin) {
            abort(403, 'Cannot delete super admin.');
        }

        // Only super admin can delete other admins
        if ($user->is_admin && !auth()->user()->is_super_admin) {
            abort(403, 'Only super admin can delete other admins.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}

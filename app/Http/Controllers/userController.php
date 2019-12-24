<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function createUser()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $users = User::all();
        //  return $users;
        return view('admin.create-user')->with('roles', $roles)->with('permissions', $permissions)->with('users', $users);
    }

    public function showUsers()
    {
        $users = User::with('permissions', 'roles')->get();
        return view('admin.show-users')->with('users', $users);
    }

    public function saveUser(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        $permissions = $request->input('permissions');
        $roles = $request->input('roles');
        $user->syncPermissions($permissions);
        $user->syncRoles($roles);
        return redirect()->route('createUser');
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('showUser');
    }

    public function editUser(User $user)
    {
        $userRoles = $user->roles()->get();
        $userPermissions = $user->permissions()->get();
        // return $userPermissions;
        $roles = Role::all();
        $permissions = Permission::all();
        //  return $users;
        return view('admin.edit-user')->with('roles', $roles)->with('permissions', $permissions)->with('user', $user)->with('userRoles', $userRoles)->with('userPermissions', $userPermissions);
    }
    public function updateUser(Request $request, User $user)
    {
        // $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // $user->password = $request->input('password');
        $user->save();
        $permissions = $request->input('permissions');
        $roles = $request->input('roles');
        $user->syncPermissions($permissions);
        $user->syncRoles($roles);
        return redirect()->route('showUser');
    }
}

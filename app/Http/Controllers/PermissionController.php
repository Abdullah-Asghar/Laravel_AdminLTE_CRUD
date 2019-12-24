<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;



class PermissionController extends Controller
{
    use HasRoles;
    public function createPermission()
    {
        $permissions = Permission::all();
        return view('admin.create-permission', compact('permissions'));
    }

    public function savePermission(Request $request)
    {
        // return $request;
        $name =  $request->input('permission');
        Permission::create(['name' => $name]);
        return redirect()->route('createPermission');
    }
    public function deletePermission(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('createPermission');
    }

    public function editPermission(Permission $permission)
    {
        return view('admin.edit-permission', compact('permission'));
    }

    public function updatePermission(Request $request, Permission $permission)
    {
        // return $request;
        $permission->name = $request->input('permission');
        $permission->save();
        return redirect()->route('createPermission');
    }

}

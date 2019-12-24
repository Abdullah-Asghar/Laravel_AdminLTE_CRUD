<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function createRole()
    {
        $roles = Role::with('permissions')->get();
        // return $roles; 
        $permissions = Permission::all();
        
        return view('admin.create-role')->with('permissions',$permissions)->with('roles',$roles);
    }

    public function saveRole(Request $request)
    {
         $role = $request->input('role');
         $permissions = $request->input('permissions');
         $role = Role::create(['name' => $role]);
         $role->syncPermissions($permissions);
         return redirect()->route('createRole');

    }

    public function deleteRole(Role $role)
    {
        $role->delete();
        return redirect()->route('createRole');
    }

    public function editRole(Role $role)
    {   
        $permissions =  $role->permissions()->get();
        // return $permissions;
       
        $all_permissions = Permission::all();
        return view('admin.edit-role')->with('role',$role)->with('permissions',$permissions)->with('all_permissions',$all_permissions);
    }

    public function updateRole(Role $role)
    {
        return $role;
    }

}

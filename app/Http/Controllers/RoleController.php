<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('Admin.roles.index')->with('roles',$roles);
    }


    public function create()
    {
        $permission = Permission::all();
        return view('Admin.roles.create')->with('permission', $permission);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required'
        ]);
        $roles = Role::create([
            'name' => $request->name
        ]);

        $roles->syncPermissions($request->permission);
        return redirect()->route('admin.roles.index');
    }

    public function show(Role $role)
    {
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where('role_has_permissions.role_id', $role->id)->get();
        return view('Admin.roles.show')->with('role', $role)->with('rolePermissions', $rolePermissions);
    }

    public function edit(Role $role)
    {
        $permission = Permission::all();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('Admin.roles.edit')->with('role',$role)->with('permission',$permission)->with('rolePermissions',$rolePermissions);
    }


    public function update(Request $request, Role $role)
    {
        $this->validate($request,[
            'name' => 'required',
            'permission' => 'required'
        ]);

        $role->name = $request->name;
        $role->save();
        $role->syncPermissions($request->permission);
        return redirect()->route('admin.roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete($role->id);
        return redirect()->route('admin.roles.index');
    }
}

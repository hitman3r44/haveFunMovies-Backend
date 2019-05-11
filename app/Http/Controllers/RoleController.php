<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{


    public function index()
    {
        if(!Helper::permissionCheck('role'))
        {
            return back()->with('error',Helper::getPermissionMsg());
        }

        $roles = Role::all();

        return view('admin.role.index', compact('roles'))->withPage('role');
    }


    public function getPermissionPrefix($permissionName){


        if(strpos($permissionName,'create-') === 0){

            return 'Create';

        }else if(strpos($permissionName,'view-') === 0){

            return 'View';

        }else if(strpos($permissionName,'update-') === 0){


            return 'Update';

        }else if(strpos($permissionName,'delete-') === 0){


            return 'Delete';

        }else if(strpos($permissionName,'self-') === 0){


            return 'Self';
        }else{

            return null;
        }

    }


    public function getModuleFromPermission($permissionName){


        if(strpos($permissionName,'create-') === 0){

           return str_replace('create-','', $permissionName);

        }else if(strpos($permissionName,'view-') === 0){

            return str_replace('view-','', $permissionName);

        }else if(strpos($permissionName,'update-') === 0){


            return str_replace('update-','', $permissionName);

        }else if(strpos($permissionName,'delete-') === 0){


            return str_replace('delete-','', $permissionName);

        }else if(strpos($permissionName,'self-') === 0){


            return str_replace('self-','', $permissionName);
        }else{

            return null;
        }

    }

    public function store(Request $request)
    {
        if(!Helper::permissionCheck('role'))
        {
            return back()->with('error',Helper::getPermissionMsg());
        }


        $this->validate($request, [
			'name' => 'required|unique:roles',
			'permissions' => 'required'
		]);

        $permissions = $request->permissions;

        $role = Role::create(['name' => $request->name]);

        $role->givePermissionTo($permissions);

        return redirect('role')->with('success', 'Role Successfully added!');
    }


    public function edit(Role $role)
    {

        if(!Helper::permissionCheck('role'))
        {
            return back()->with('error',Helper::getPermissionMsg());
        }

        $permissions = Permission::all();

        return view('admin.role.edit', compact('role', 'permissions'));
    }


    public function update(Request $request, Role $role)
    {
        if(!Helper::permissionCheck('role'))
        {
            return back()->with('error',Helper::getPermissionMsg());
        }

        $this->validate($request, [
			'permissions' => 'required'
		]);


        $permissions = $request->permissions;

        $message = 'Role With Permission updated! ';

        if($role->name == 'super-admin' || $role->name == 'admin' ){

            $message .= 'Super-Admin and Admin role name will not change';
        }

        if($role->name == 'super-admin'){

            $role->syncPermissions(Permission::all());
            $message .= ". Also Super Admin always get the full previlage";
        }else{

            $role->syncPermissions($permissions);
        }

        return redirect()->route('admin.role.edit', $role->id)->with('success', $message);
    }

}

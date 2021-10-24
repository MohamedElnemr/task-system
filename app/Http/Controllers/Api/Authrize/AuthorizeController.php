<?php

namespace App\Http\Controllers\Api\Authrize;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class AuthorizeController extends Controller
{
    //
    public function Roles()  {

        $role = Role::all();
        // return $role;
        return \response()->json($role, 200);

    }

    public function permissions()  {

        $per = permission::all();
        // return $role;
        return \response()->json($per, 200);

    }


    public function createRole(Request $request)  {


        // $role = Role::create(['name' => 'devolper']);
        // return $role;

        $role = Role::create($request->all());
        return $role;

    }


    public function createPermission(Request $request)  {

        // $permission = Permission::create(['name' => 'show articles']);
        // return $permission;

        $permission= Permission::create($request->all());
        return $permission;


    }


    public function addPermissionToRole()  {

        // // $role = Role::find(role_id);
        $role = Role::where("name","devolper")->first();
        $permission = permission::where("name","delete articles")->first();
        $permission->assignRole($role);
        return $role->permissions;

        // $role = Role::find($id);

        // $permission = permission::where("name",$per)->first();
        // $permission->assignRole($role);
        // return \response()->json($role->permissions,200);

    }


    public function addRoleToUser()  {

        $user =User::find(3);
        $user->assignRole('devolper');
        return \response()->json($user->getAllPermissions(), 200);

    }


    public function testPermission()  {

        $user =User::find(3);
        if ($user->can("show articles")) {
            return 'Yes this user has permissions';
        }else{
            return 'This user have not any permissins';
        }
    }
}

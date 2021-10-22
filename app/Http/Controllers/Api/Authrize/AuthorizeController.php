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
    public function createRole()  {

        $role = Role::create(['name' => 'devolper']);
        return $role;

    }


    public function createPermission()  {

        $permission = Permission::create(['name' => 'show articles']);
        return $permission;

    }


    public function addPermissionToRole()  {

        // $role = Role::find(role_id);
        $role = Role::where("name","devolper")->first();
        $permission = permission::where("name","show articles")->first();
        $permission->assignRole($role);
        return $role->permissions;

    }


    public function addRoleToUser()  {

        $user =User::find(4);
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

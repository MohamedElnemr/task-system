<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Http\Request;

class UserRepository implements I_User
{
    public function __construct()
    {


    }

    public function all()
    {
        // return User::all();
        $users = User::all();
        return \response()->json(['data'=>$users]);
    }

    public function getUgetUserByIdsers()
    {

    }

    public function saveUser(Request $request)
    {
        $user= User::create($request->all());
        // return \response()->json(['data'=>$user]);
        return $user;


    }

    public function showUser($id)
    {
        $user = User::find($id);
        return $user;
    }
}

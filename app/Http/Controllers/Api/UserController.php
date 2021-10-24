<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Repository\I_User;

class UserController extends Controller
{

    public $userRepo;

    public function __construct(I_User $userRepo)
    {
        $this->userRepo = $userRepo;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // هنا لو مش عايز استخدم الكونستراكت هعمل الميثود بالشكل ده
    // public function index(I_User $userRepo)
    // {
    //
    //     return $userRepo->all();
    // }


    public function index()
    {
        // return User::all();
        return $this->userRepo->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $user->organization_id = $request->organization_id;
        // $user->save();
        // return $user;


        // $user= User::create($request->all());
        // return $user;

        return $this->userRepo->saveUser($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = User::find($id);
        // return $user;

        return $this->userRepo->showUser($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

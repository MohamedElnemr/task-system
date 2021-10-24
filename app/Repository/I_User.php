<?php


namespace App\Repository;

use Illuminate\Http\Request;

interface I_User
{
    public function all();

    public function getUgetUserByIdsers();

    public function saveUser(Request $request);

    public function showUser($id);



}

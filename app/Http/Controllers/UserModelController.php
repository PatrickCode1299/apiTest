<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserModelController extends Controller
{
public function findUsers(Request $request){
    $findAllUsers=User::first();
   $user_name= $findAllUsers->name;
    return $response=[
        "reply" => $user_name,
    ];
    
}
public function addUsers(Request $request){
    $findAllUsers=User::get();
    dd($findAllUsers);
}
}

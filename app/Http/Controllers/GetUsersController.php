<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class GetUsersController extends Controller
{
    public function users()
    {
        $findUsers=User::get();
        return $response=[
            "all_users" => $findUsers
        ];
    }
}

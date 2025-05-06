<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class GetUsersController extends Controller
{
    public function users()
    {
        return response()->json(User::select('id', 'name', 'email')->get());
    }
}

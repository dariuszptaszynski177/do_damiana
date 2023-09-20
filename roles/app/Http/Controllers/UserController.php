<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function users()
    {
        $users = User::get();

        foreach($users as $user)
        {
            if($user->hasRole('Admin'))
            {
                dd("admin");
            }
        }
    }
}

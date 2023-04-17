<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //

    function registerUser(Request $request) {
        
        // return $request->email;



        // return "I am inside the register controller";

        User::create(
            [
                "email"=>$request->email,
                "password"=>Hash::make($request->password),
            
            ]
            );
    }

    function returnRegisterPage() {
        return view("register");
    }
}

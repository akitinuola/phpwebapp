<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
  
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
    function returnLoginpage() {
        Session::remove('id');
        Session::remove('email');
        Session::remove('username');
        Session::remove('role');
        
        return view("Login");
    }


    function login(Request $request)
    {

        // return $request;

        $this->validate($request, [
            "email" => "email:rfc",
            "password" => "required|min:8 ",
            
        ]);


        $checkemail = User::where("email",$request->email)->first();
        if($checkemail==""){
            return Redirect::back()->withErrors(["email doesnt exists"]);
        }

        if(!Hash::check($request->password, $checkemail->password)){
            return Redirect::back()->withErrors (["incorrect password"]);
        }
        Session::put('id',$checkemail->id);
        Session::put('email',$checkemail->email);
        Session::put('username',$checkemail->username);
        Session::put('role',$checkemail->role);
        return redirect("/dashboard");

    }
}





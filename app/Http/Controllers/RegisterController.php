<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;  

class RegisterController extends Controller
{
    //


   

    function registerUser(Request $request)
    {

        // return $request;

        $this->validate($request, [
            "email" => "email:rfc,dns",
            "username" => "required",
            "password" => "required|min:8 ",
            "firstName" => "required",
            "lastName" => "required",
            "postcode" => "required",
            "address" => "required",
            "phonenumber" => "required",
            "gender" => "required",
            "dob"=> "required",
        ]);

        $checkUsername = User::where("username",$request->username)->first();

        if($checkUsername!=""){
            return Redirect::back()->withErrors(['msg'=> "username already exists"]);
        }

        $checkemail = User::where("email",$request->email)->first();
        if($checkemail!=""){
            return Redirect::back()->withErrors(["email already exists"]);
        }

        $checkphonenumber = User::where("phonenumber",$request->phonenumber)->first();
        if($checkphonenumber!=""){
            return Redirect::back()->withErrors(["number already exists"]);
        }

        $checkAge = $this->getAge($request->dob);
        if($checkAge < 18) {
            return Redirect::back()->withErrors(["Contact your guardian to create your account"]);
        }

        if($request->password!=$request->password_confirmation){
            return Redirect::back()->withErrors (["passwords dont match"]);
        }

        User::create([
            "email" => $request->email,
            "username" => $request->username,
            "password" => Hash::make($request->password),
            "firstName" => $request->firstName,
            "lastName" => $request->lastName,
            "phonenumber" => $request->phonenumber,
            "postcode" => $request->postcode,
            "address" => $request->address,
            "gender" => $request->gender,
            "dob" => $request->dob,
            "role" => $request->role
        ]);
        $checkemail = User::where("email",$request->email)->first();

        Session::put('id',$checkemail->id);
        Session::put('username',$checkemail->username);
        Session::put('email',$checkemail->email);
        Session::put('role',$checkemail->role);

        return redirect("/dashboard"); #redirect changes the url wheraas view just loads the view and doesnt change the url

        
    }

    function getAge($dateOfBirth) {
        $today = Carbon::parse('today');
        $dob = Carbon::parse($dateOfBirth);

        $age = $dob->diffInYears($today);

        return $age;
    }

//     function returnRegisterPage()
//     {
//         $users = User::all();
//         $users = User::all();
//         return view("register", compact("users"));
//     }
}

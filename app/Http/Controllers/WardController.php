<?php

namespace App\Http\Controllers;

use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class WardController extends Controller
{
    //
    //
    function loadward()
    {
        // the return view the  ['squad' => $getsquad] is to allow mw to pass data into the view
        // allow me to access the database for squads and getting it, the passing it to the view 
        // SELECT * FROM squad
        $getWards = Ward::with('wardDetails')->where('parentId', session('id'))->get();

        return view("portal.ward", ['wards' => $getWards]);
    }


    function addWard(Request $request)
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
            "dob" => "required",
        ]);

        $checkUsername = User::where("username", $request->username)->first();

        if ($checkUsername != "") {
            return Redirect::back()->withErrors(['msg' => "username already exists"]);
        }

        $checkemail = User::where("email", $request->email)->first();
        if ($checkemail != "") {
            return Redirect::back()->withErrors(["email already exists"]);
        }

        $checkphonenumber = User::where("phonenumber", $request->phonenumber)->first();
        if ($checkphonenumber != "") {
            return Redirect::back()->withErrors(["number already exists"]);
        }



        if ($request->password != $request->password_confirmation) {
            return Redirect::back()->withErrors(["passwords dont match"]);
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
            "role" => "swimmer"
        ]);
        $checkemail = User::where("email", $request->email)->first();

        Ward::create([
            "wardId" => $checkemail->id,
            "parentId" => session('id')
        ]);

        return redirect("/ward"); #redirect changes the url wheraas view just loads the view and doesnt change the url

       
    }
    function loadEditWard($wardId)
    {
        // the return view the  ['squad' => $getsquad] is to allow mw to pass data into the view
        // allow me to access the database for squads and getting it, the passing it to the view 
        // SELECT * FROM squad
        $getWard = User::where('Id', $wardId)->first();

        return view("portal.edit-ward", ['editWard' => $getWard]);
    }

    function updateWard(Request $request, $wardId) {

        $this->validate($request, [

            "firstname" => "required",
            "lastname" => "required",
            "postcode" => "required",
            "address" => "required",
            "username" => "required",
            "email" => "required",
            "phonenumber" => "required",

        ]);

        $checkUsername = User::where("username",$request->username)->whereNot('id', $wardId)->first();

        if($checkUsername!=""){
            return Redirect::back()->withErrors(['msg'=> "username already exists"]);
        }

        $checkemail = User::where("email",$request->email)->whereNot('id', $wardId)->first();
        if($checkemail!=""){
            return Redirect::back()->withErrors(["email already exists"]);
        }

        $checkphonenumber = User::where("phonenumber",$request->phonenumber)->whereNot('id', $wardId)->first();
        if($checkphonenumber!=""){
            return Redirect::back()->withErrors(["number already exists"]);
        }


        $getWard = User::where('id', $wardId)->first();

        $getWard->firstName = $request->firstname;
        $getWard->lastName= $request->lastname;
        $getWard->username = $request->username;
        $getWard->postcode = $request->postcode;
        $getWard->address = $request->address;
        $getWard->email = $request->email;
        $getWard->phonenumber = $request->phonenumber;

        $getWard->save();

        return redirect("/ward");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\GalaPerformance;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class UserController extends Controller
{
    //
    function loadUserPage() {
        // the return view the  ['squad' => $getsquad] is to allow mw to pass data into the view
        // allow me to access the database for squads and getting it, the passing it to the view 
        // SELECT * FROM squad
        $getUser = User::get();

        return view("portal.users", ['users' => $getUser]);
    }

    function loadSwimmerPage() {
        // the return view the  ['squad' => $getsquad] is to allow mw to pass data into the view
        // allow me to access the database for squads and getting it, the passing it to the view 
        // SELECT * FROM squad
        $getSwimmers = User::where('role', 'swimmer')->get();

        foreach($getSwimmers as $swimmer) {
            $swimmer['age'] = $this->getAge($swimmer->dob);
            $swimmer['numberOfFirstPlace'] = GalaPerformance::where('swimmerId', $swimmer->id)->where('position', '1')->count();
            $swimmer['numberOfSecondPlace'] = GalaPerformance::where('swimmerId', $swimmer->id)->where('position', '2')->count();
            $swimmer['numberOfThirdPlace'] = GalaPerformance::where('swimmerId', $swimmer->id)->where('position', '3')->count();
        }

        return view("portal.swimmers", ['swimmers' => $getSwimmers]);
    }
    function getAge($dateOfBirth) {
        $today = Carbon::parse('today');
        $dob = Carbon::parse($dateOfBirth);

        $age = $dob->diffInYears($today);

        return $age;
    }

    function loadSettings() {
        // the return view the  ['squad' => $getsquad] is to allow mw to pass data into the view
        // allow me to access the database for squads and getting it, the passing it to the view 
        // SELECT * FROM squad
        $getSettings = User::where('email', session('email'))->first();

        return view("portal.settings", ['settings' => $getSettings]);
    }

    function updateSettings(Request $request, $settingsId) {

        $this->validate($request, [

            "firstname" => "required",
            "lastname" => "required",
            "postcode" => "required",
            "address" => "required",
            "username" => "required",
            "email" => "required",
            "phonenumber" => "required",

        ]);

        $checkUsername = User::where("username",$request->username)->whereNot('id', $settingsId)->first();

        if($checkUsername!=""){
            return Redirect::back()->withErrors(['msg'=> "username already exists"]);
        }

        $checkemail = User::where("email",$request->email)->whereNot('id', $settingsId)->first();
        if($checkemail!=""){
            return Redirect::back()->withErrors(["email already exists"]);
        }

        $checkphonenumber = User::where("phonenumber",$request->phonenumber)->whereNot('id', $settingsId)->first();
        if($checkphonenumber!=""){
            return Redirect::back()->withErrors(["number already exists"]);
        }


        $getSettings = User::where('id', $settingsId)->first();

        $checkAge = $this->getAge($getSettings->dob);
        if($checkAge < 18) {
            return Redirect::back()->withErrors(["Contact your guardian to update your details"]);
        }

        $getSettings->firstName = $request->firstname;
        $getSettings->lastName= $request->lastname;
        $getSettings->username = $request->username;
        $getSettings->postcode = $request->postcode;
        $getSettings->address = $request->address;
        $getSettings->email = $request->email;
        $getSettings->phonenumber = $request->phonenumber;

        $getSettings->save();

        return redirect("/settings");
    }
}


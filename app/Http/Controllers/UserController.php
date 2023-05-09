<?php

namespace App\Http\Controllers;

use App\Models\GalaPerformance;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;

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
}

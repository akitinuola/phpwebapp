<?php

namespace App\Http\Controllers;

use App\Models\Gala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\GalaPerformance;
use Carbon\Carbon;

class GalaController extends Controller
{
    //
    function loadGalaPage() {

        $getGala = Gala::get();

        return view("portal.gala", ['Galas' => $getGala]);
    }

    public function addGala(Request $request)
    {

        $this->validate($request, [

            "name" => "required",
            "description" => "required",
            "date" => "required|date|after:today",
            "time" => "required",
            "location" => "required",

        ]);


        $createGala = Gala::where("name",$request->name)->first();

        // != represents not equal to, so if i check squad and its not empty or filled with something, means it has been taken
        if($createGala != ""){
            return Redirect::back()->withErrors(['msg'=> "Gala already exists"]);
        }

        Gala::create([
           
            "name" => $request->name,
            "description" => $request->description,
            "date" => $request->date,
            "time" => $request->time,
            "location" => $request->location,
        
        ]);

        return redirect("/gala");
    }

    function loadEditGala ($GalaId) {

        $getGala = Gala::where('id', $GalaId)->first();

        $getGalaPerformances = GalaPerformance::where('galaId', $GalaId)->get();


        return view("portal.edit-gala",  ['GalaDetails' => $getGala, 'getGalaPerformances' => $getGalaPerformances]);
    }

    function updateGala(Request $request, $GalaId) {

        $this->validate($request, [

            "name" => "required",
            "description" => "required",
            "time" => "required",
            "date" => "required",
            "location" => "required",
           

        ]);

        $checkGala= Gala::where("name",$request->name)->whereNot('id', $GalaId)->first();

        // != represents not equal to, so if i check squad and its not empty or filled with something, means it has been taken
        if($checkGala != ""){
            return Redirect::back()->withErrors(['msg'=> "training already exists"]);
        }

        $getGala = Gala::where('id', $GalaId)->first();

        $getGala->name = $request->name;
        $getGala->description = $request->description;
        $getGala->date = $request->date;
        $getGala->time = $request->time;
        $getGala->location = $request->location;
      

        $getGala->save();

        return redirect("/gala");
    }

    function deleteGala($GalaId) {
        $getGala = Gala::where('id', $GalaId)->first();

        $getGala->delete();

        return redirect('/gala');
    }

    function loadNewGalaPerformancePage($GalaId) {
        // the return view the  ['coaches' => $getCoaches] is to allow mw to pass data into the view
        // allow me to access the database for different coaches that would show in the front end

        $getSwimmers = User::where("role", 'swimmer')->get();
#we  put the getswimmer and $squadid functon to dispay them both as the view
        return view("portal.new-gala-performance", ['swimmers' => $getSwimmers, 'GalaId' => $GalaId]);
    }

    function addGalaPerformance(Request $request, $GalaId) {

        $this->validate($request, [
#to make sure the time input is exactly in time format , etra validation was put
#i represents minutes, s represents secons and v represents millisecond
            "time" => "required|date_format:i:s.v",
            "swimmerId" => "required|integer",
            "point" => "required",
            "position" => "required",
            "stroke" => "required",

        ]);

        $getSwimmer = User::where('id', $request->swimmerId)->first();

        $age = $this->getAge($getSwimmer->dob);

        GalaPerformance::create([
           
            "time" => $request->time,
            "position" => $request->position,
            "swimmerId" => $request->swimmerId,
            "galaId" => $GalaId,
            "name" => $getSwimmer->firstName.' '.$getSwimmer->lastName,
            "age" => $age,
            "gender" => $getSwimmer->gender,
            "point" => $request->point,
            "stroke" => $request->stroke,
        ]);

        return redirect("/edit-gala/".$GalaId);
    }

    function getAge($dateOfBirth) {
        $today = Carbon::parse('today');
        $dob = Carbon::parse($dateOfBirth);

        $age = $dob->diffInYears($today);

        return $age;
    }

    function loadEditGalaPerformance ($GalaPerformanceId) {

        $getGalaPerformances = GalaPerformance::where('id', $GalaPerformanceId)->first();


        return view("portal.edit-gala-performance", [ 'GalaPerformance' => $getGalaPerformances]);
    }

    function updateGalaPerformance(Request $request, $GalaPerformanceId) {

        $this->validate($request, [

            "time" => "required|date_format:i:s.v",
            "point" => "required|integer",
            "position" => "required|integer",
            "stroke" => "required",

        ]);

        

        $getGalaPerformance = GalaPerformance::where('id', $GalaPerformanceId)->first();

        $getGalaPerformance->time = $request->time;
        $getGalaPerformance->point = $request->point;
        $getGalaPerformance->position = $request->position;
        $getGalaPerformance->stroke = $request->stroke;

        $getGalaPerformance->save();

        return redirect("/edit-gala/". $getGalaPerformance->galaId);
    }

    function deleteGalaPerformance($GalaPerformanceId) {
        $getGalaPerformance = GalaPerformance::where('id', $GalaPerformanceId)->first();

        $getGalaPerformance->delete();

        return redirect("/edit-gala/". $getGalaPerformance->galaId);
    }

}

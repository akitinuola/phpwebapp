<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Squad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class SquadController extends Controller
{
    //

    function loadSquadPage() {
        // the return view the  ['squad' => $getsquad] is to allow mw to pass data into the view
        // allow me to access the database for squads and getting it, the passing it to the view 
        // SELECT * FROM squad
        $getSquads = Squad::with('coachDetails')->get();

        return view("portal.squad", ['squads' => $getSquads]);
    }

    function loadNewSquadPage() {
        // the return view the  ['coaches' => $getCoaches] is to allow mw to pass data into the view
        // allow me to access the database for different coaches that would show in the front end

        $getCoaches = User::where("role", 'coach')->get();

        return view("portal.new-squad", ['coaches' => $getCoaches]);
    }

    function addSquad(Request $request) {

        $this->validate($request, [
            "name" => "required",
            "description" => "required",
            "status" => "required",
            "coachId" => "required",
            
        ]);

        
        $checksquad = Squad::where("name",$request->name)->first();

        // != represents not equal to, so if i check squad and its not empty or filled with something, means it has been taken
        if($checksquad != ""){
            return Redirect::back()->withErrors(['msg'=> "squad already exists"]);
        }

        Squad::create([
           
            "name" => $request->name,
            "description" => $request->description,
            "status" => $request->status,
            "coachId" => $request->coachId,
        ]);

        return redirect("/squads");


    }

    function loadEditSquad($squadId) {
        // the first means it should check the squad table in the database where id= the squad id in the url and pick the first information with that id
        // the get means to get all the information, for instance it has found the first id and wpuld now get all information relating to it
        $getSquad = Squad::where('id', $squadId)->first();

        $getCoaches = User::where("role", 'coach')->get();

        return view("portal.edit-squad", ['coaches' => $getCoaches, 'squadDetails' => $getSquad]);
    }

    function updateSquad(Request $request, $squadId) {

        $this->validate($request, [
            "name" => "required",
            "description" => "required",
            "status" => "required",
            
        ]);

        $checksquad = Squad::where("name",$request->name)->whereNot('id', $squadId)->first();

        // != represents not equal to, so if i check squad and its not empty or filled with something, means it has been taken
        if($checksquad != ""){
            return Redirect::back()->withErrors(['msg'=> "squad already exists"]);
        }

        $getSquad = Squad::where('id', $squadId)->first();

        $getSquad->name = $request->name;
        $getSquad->description = $request->description;
        $getSquad->status = $request->status;

        $getSquad->save();

        return redirect("/squads");
    }

    function deleteSquad($squadId) {
        // the first means it should check the squad table in the database where id= the squad id in the url and pick the first information with that id
        // the get means to get all the information, for instance it has found the first id and wpuld now get all information relating to it
        $getSquad = Squad::where('id', $squadId)->first();

        $getSquad->delete();

        return redirect('/squads');
    }
}

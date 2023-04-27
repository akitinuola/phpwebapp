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
#get is to collect all swimmers that belong to the squad
        $getMembers = User::where("role", 'swimmer')->where('squadId', $squadId)->get();
        

        return view("portal.edit-squad", ['coaches' => $getCoaches, 'squadDetails' => $getSquad, 'getMembers' => $getMembers]);
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

    function loadNewSquadMemberPage($squadId) {
        // the return view the  ['coaches' => $getCoaches] is to allow mw to pass data into the view
        // allow me to access the database for different coaches that would show in the front end

        $getSwimmers = User::where("role", 'swimmer')->get();
#we  put the getswimmer and $squadid functon to dispay them both as the view
        return view("portal.new-squad-member", ['swimmers' => $getSwimmers, 'squadId' => $squadId]);
    }

    function addSquadMember(Request $request, $squadId) {

        $this->validate($request, [
            "swimmerId" => "required",   
        ]);

        
        $checksquad = Squad::where("id",$squadId)->first();

        // != represents not equal to, so if i check squad and its not empty or filled with something, means it has been taken
        if($checksquad == ""){
            return Redirect::back()->withErrors(['msg'=> "squad does not exist"]);
        }

        $checkSwimmer = User::where('id', $request->swimmerId)->first();

        $checkSwimmer->squadId = $squadId;
        $checkSwimmer->save();

        return redirect("/edit-squad/".$squadId);


    }

    function deleteSquadMember($squadMemberId) {
        // the first means it should check the squad table in the database where id= the squad id in the url and pick the first information with that id
        // the get means to get all the information, for instance it has found the first id and wpuld now get all information relating to it
        $getSquadMember = User::where('id', $squadMemberId)->first();
#we put null cause when we delete it theyre still in the club, this is to just remove them from a squad
        $getSquadMember->squadId = null;
        $getSquadMember->save();

        return back();
    }
}

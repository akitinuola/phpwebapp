<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Training;
use Illuminate\Support\Facades\Redirect;
use App\Models\Squad;


class TrainingController extends Controller
{

    function loadTrainingPage() {

        $getTrainings = Training::with('squadDetails')->get();

        return view("portal.training", ['trainings' => $getTrainings]);
    }

    function loadNewTrainingPage (){
        $getSquads = Squad::with('coachDetails')->get();

        return view("portal.new-training", ['squads' => $getSquads]);
    }


    
    public function addTraining(Request $request)
    {

        $this->validate($request, [

            "name" => "required",
            "description" => "required",
            "interval" => "required",
            "squadId" => "required",
            "time" => "required",
            "day" => "required",

        ]);



        $createTraining = Training::where("name",$request->name)->first();

        // != represents not equal to, so if i check squad and its not empty or filled with something, means it has been taken
        if($createTraining != ""){
            return Redirect::back()->withErrors(['msg'=> "Training already exists"]);
        }

        Training::create([
           
            "name" => $request->name,
            "description" => $request->description,
            "interval" => $request->interval,
            "squadId" => $request->squadId,
            "time" => $request->time,
            "day" => $request->day,
        ]);

        return redirect("/training");
    }

    function deleteTraining($trainingId) {
        $gettraining = training::where('id', $trainingId)->first();

        $gettraining->delete();

        return redirect('/training');
    }

    function loadEditTraining ($trainingId) {

        $gettraining = Training::where('id', $trainingId)->first();

        $getSquads = Squad::with('coachDetails')->get();

        return view("portal.edit-training", ['squads' => $getSquads, 'trainingDetails' => $gettraining]);
    }

    function updateTraining(Request $request, $trainingId) {

        $this->validate($request, [

            "name" => "required",
            "description" => "required",
            "interval" => "required",
            "squadId" => "required",
            "time" => "required",
            "day" => "required",

        ]);

        $checktraining= Training::where("name",$request->name)->whereNot('id', $trainingId)->first();

        // != represents not equal to, so if i check squad and its not empty or filled with something, means it has been taken
        if($checktraining != ""){
            return Redirect::back()->withErrors(['msg'=> "training already exists"]);
        }

        $gettraining = Training::where('id', $trainingId)->first();

        $gettraining->name = $request->name;
        $gettraining->description = $request->description;
        $gettraining->interval = $request->interval;
        $gettraining->squadId = $request->squadId;
        $gettraining->time = $request->time;
        $gettraining->day = $request->day;

        $gettraining->save();

        return redirect("/training");
    }
}

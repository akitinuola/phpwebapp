<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\TrainingPerformance;
use App\Models\User;

class TrainingPerformanceController extends Controller
{
    //

    function loadTrainingPerformancePage() {

        $getTrainingPerformances = TrainingPerformance::with(['trainingDetails', 'swimmerDetails'])->get();

        return view("portal.training-performance", ['trainingPerformances' => $getTrainingPerformances]);
    }

    function loadNewTrainingPerformancePage() {

        $getTrainings = Training::with('squadDetails')->get();
        $getSwimmers = User::where("role", 'swimmer')->get();

        return view("portal.new-performance", ['swimmers' => $getSwimmers, 'trainings' => $getTrainings]);
    }

    function addTrainingPerformance(Request $request) {

        $this->validate($request, [
#to make sure the time input is exactly in time format , etra validation was put
#i represents minutes, s represents secons and v represents millisecond
            "time" => "required|date_format:i:s.v",
            "trainingId" => "required|integer",
            "swimmerId" => "required|integer",
            "rank" => "required",
            "trainingDate" => "required",
            "stroke" => "required",

        ]);

        TrainingPerformance::create([
           
            "time" => $request->time,
            "trainingId" => $request->trainingId,
            "swimmerId" => $request->swimmerId,
            "rank" => $request->rank,
            "trainingDate" => date("Y-m-d", strtotime($request->trainingDate)),
            "stroke" => $request->stroke,
        ]);

        return redirect("/training-performance");
    }

    function loadEditPerformance($performanceId) {

        $gettrainingperformance = TrainingPerformance::where('id', $performanceId)->first();

        $getTrainings = Training::with('squadDetails')->get();
        $getSwimmers = User::where("role", 'swimmer')->get();

        return view("portal.edit-performance", ['swimmers' => $getSwimmers, 'trainings' => $getTrainings, 'gettrainingperformance' => $gettrainingperformance]);
    }

    function updatePerformance(Request $request, $performanceId) {

        $this->validate($request, [

            "time" => "required|date_format:i:s.v",
            "trainingId" => "required|integer",
            "swimmerId" => "required|integer",
            "rank" => "required",
            "trainingDate" => "required",
            "stroke" => "required",

        ]);

        

        $getPerformance = TrainingPerformance::where('id', $performanceId)->first();

        $getPerformance->time = $request->time;
        $getPerformance->trainingId = $request->trainingId;
        $getPerformance->swimmerId = $request->swimmerId;
        $getPerformance->rank = $request->rank;
        $getPerformance->trainingDate = $request->trainingDate;
        $getPerformance->stroke = $request->stroke;

        $getPerformance->save();

        return redirect("/training-performance");
    }

    function deletePerformance($performanceId) {
        $getPerformance = TrainingPerformance::where('id', $performanceId)->first();

        $getPerformance->delete();

        return redirect('/training-performance');
    }

}

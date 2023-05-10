<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SquadController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TrainingPerformanceController;
use App\Http\Controllers\GalaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WardController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/home', function () {
    return view("home");

});
// Registration routes


Route::get('/register', function () {
    return view('portal.register');
});
Route::post('/register-user', [RegisterController::class,"registerUser"]);

// Login route
Route::get('/login', [LoginController::class,"returnLoginpage"]);
 Route::post('/login-user', [LoginController::class,"login"]);



// Dashboard routes
Route::get('/dashboard', [DashboardController::class,"loadDashboard"]);

Route::get('/squads', [SquadController::class,"loadSquadPage"]);
Route::get('/new-squad', [SquadController::class,"loadNewSquadPage"]);
Route::post('/add-squad', [SquadController::class,"addSquad"]);

Route::get('/edit-squad/{squadId}', [SquadController::class,"loadEditSquad"]);
// the {id} is to allow the squad id to be passed in the url cause they are several id numbers like 1,2,3 
// {id} means you are expecting a variable called id 
Route::post('/update-squad/{squadId}', [SquadController::class,"updateSquad"]);
Route::get('/delete-squad/{squadId}', [SquadController::class,"deleteSquad"]);

#{squadId}, this is in a curly brace because we dont know the particular id its calling
Route::get('/edit-squad/{squadId}/new-squad-member', [SquadController::class,"loadNewSquadMemberPage"]);
Route::post('/add-squad-member/{squadId}', [SquadController::class,"addSquadMember"]);
Route::get('/delete-squad-member/{squadMemberId}', [SquadController::class,"deleteSquadMember"]);

Route::get('/swimmers', function () {
    return view("portal.swimmers");
});


Route::get('/coaches', function () {
    return view("portal.coaches");
});


Route::get('/training', [TrainingController::class,"loadTrainingPage"]);
Route::get('/new-training', [TrainingController::class,"loadNewTrainingPage"]);
Route::post('/add-training', [TrainingController::class,"addTraining"]);
Route::get('/delete-training/{trainingId}', [TrainingController::class,"deleteTraining"]);

Route::get('/edit-training/{trainingId}', [TrainingController::class,"loadEditTraining"]);
Route::post('/update-training/{trainingId}', [TrainingController::class,"updateTraining"]);


Route::get('/training-performance', [TrainingPerformanceController::class,"loadTrainingPerformancePage"]);
Route::get('/new-performance', [TrainingPerformanceController::class,"loadNewTrainingPerformancePage"]);
Route::post('/add-training-performance', [TrainingPerformanceController::class,"addTrainingPerformance"]);

Route::get('/edit-performance/{performanceId}', [TrainingPerformanceController::class,"loadEditPerformance"]);
Route::post('/update-performance/{performanceId}', [TrainingPerformanceController::class,"updatePerformance"]);
Route::get('/deletePerformance/{performanceId}', [TrainingPerformanceController::class,"deletePerformance"]);


Route::get('/gala', [GalaController::class,"loadGalaPage"]);


Route::get('/new-gala', function () {
    return view("portal.new-gala");
    
});

Route::post('/add-gala', [GalaController::class,"addGala"]);
Route::get('/edit-gala/{GalaId}', [GalaController::class,"loadEditGala"]);
Route::post('/update-gala/{GalaId}', [GalaController::class,"updateGala"]);
Route::get('/delete-gala/{GalaId}', [GalaController::class,"deleteGala"]);

Route::get('/edit-gala/{GalaId}/new-gala-performance', [GalaController::class,"loadNewGalaPerformancePage"]);
Route::post('/add-gala-performance/{GalaId}', [GalaController::class,"addGalaPerformance"]);

Route::get('/edit-gala-performance/{GalaPerformanceId}', [GalaController::class,"loadEditGalaPerformance"]);
Route::post('/update-gala-performance/{GalaPerformanceId}', [GalaController::class,"updateGalaPerformance"]);
Route::get('/delete-gala-performance/{GalaPerformanceId}', [GalaController::class,"deleteGalaPerformance"]);


Route::get('/users', [UserController::class,"loadUserPage"]);
Route::get('/swimmers', [UserController::class,"loadSwimmerPage"]);

Route::get('/settings', [UserController::class,"loadSettings"]);
Route::post('/update-settings/{settingsId}', [UserController::class,"updateSettings"]);

Route::get('/ward', [WardController::class,"loadWard"]);
Route::get('/new-ward', function () {
    return view("portal.new-ward");
    
});
Route::post('/add-ward', [WardController::class,"addWard"]);
Route::get('/edit-ward/{WardId}', [WardController::class,"loadEditWard"]);
Route::post('/update-ward/{WardId}', [WardController::class,"updateWard"]);
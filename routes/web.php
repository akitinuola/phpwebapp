<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SquadController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
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
Route::get('/dashboard', function () {
    return view("portal.dashboard");
});

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

Route::get('/users', function () {
    return view("portal.users");
});

Route::get('/coaches', function () {
    return view("portal.coaches");
});
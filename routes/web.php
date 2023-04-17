<?php

use App\Http\Controllers\LoginController;
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


// Route::get('/first', [RegisterController]);

Route::get('/register-user', [RegisterController::class,"returnRegisterPage"]);
Route::post('/register-user', [RegisterController::class,"registerUser"]);

Route::get('/login', [LoginController::class,"returnLoginpage"]);
// Route::post('/login', [LoginController::class,"login"]);

Route::get('/dashboard', function () {
    return view("portal.base");
});


Route::get('/coaches', function () {
    return view("portal.coaches");
});
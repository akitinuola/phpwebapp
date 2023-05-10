<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gala;
use App\Models\User;
use App\Models\Squad;

class DashboardController extends Controller
{
    //

    function loadDashboard() {

        $getGala = Gala::get();
        $totalSwimmers = User::where('role', 'swimmer')->count();
        $totalCoaches = User::where('role', 'coach')->count();
        $totalSquad = Squad::count();
        $totalGala= Gala::count();

        return view("portal.dashboard", ['Galas' => $getGala, 'totalSwimmers' => $totalSwimmers, 'totalCoaches'  => $totalCoaches, 'totalSquad' => $totalSquad, 'totalGala' => $totalGala]);
        
    }

}

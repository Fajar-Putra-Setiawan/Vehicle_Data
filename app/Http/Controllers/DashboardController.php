<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalVehicles = Vehicle::count();

        return view('dashboard', compact('totalUsers', 'totalVehicles'));
    }
}

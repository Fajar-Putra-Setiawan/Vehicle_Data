<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        // Redirect based on role
        if ($user->role === 'admin') {
            return redirect()->route('dashboard');
        } elseif ($user->role === 'user') {
            return redirect()->route('vehicles.index');
        }

        // Fallback jika role tidak terdefinisi
        return redirect('/')->with('error', 'Role tidak dikenali.');
    }
}

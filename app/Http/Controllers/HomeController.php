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
        // Pengkondisian jika admin login maka langsung masuk ke halaman dashboard
        if(Auth::user()->role == 'Admin'){
            return redirect('dashboard');
        }else{
            return view('home');
        }
    }
}

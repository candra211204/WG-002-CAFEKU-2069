<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Ambil semua data dari menu
        $data = Menu::all();

        // Ke halaman beranda
        return view('beranda.beranda', compact('data'));
    }
}

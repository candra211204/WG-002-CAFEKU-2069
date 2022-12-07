<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Ke halaman dashboard
        return view('dashboard.dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Deklarasi variabel nama
        $nama = $request->nama;

        // Deklarasi pesanan (jika inputan pesanan lebih dari 1 maka harus mengunakan koma)
        $pesanan = explode(',', $request->pesanan);

        // Delarasi status
        $status = $request->status;

        // Deklarasi jumlah pesanan = hitung inputan dari form pesanan
        $jumlahPesanan = count($pesanan);

        // Deklarasi total pesanan = meghitung jumlah pesanan 
        $totalPesanan = $jumlahPesanan * 50000;

        // Buat objek dari class total pembayaran yang mengextend class diskon
        $hasilClass = new TotalPembayaran;
        
        // Menampilkan ke view
        $data['hasilNama'] = $nama;
        $data['hasilJumlah'] = $jumlahPesanan;
        $data['hasilTotal'] = $totalPesanan;
        $data['hasilStatus'] = $status;
        $data['hasilDiskon'] = $hasilClass->diskon($status, $totalPesanan);
        $data['hasilPembayaran'] = $hasilClass->TotalPembayaran($status, $totalPesanan);

        // Ke halaman dasboard
        return view('dashboard.dashboard', compact('data'));
    }
}

// Interface
interface StatusDiskon{
    public function diskon($status, $totalPesanan);
}

// Class diskon 
class Diskon implements StatusDiskon{
    public function diskon($status, $totalPesanan){
        if($status == 'Member' && $totalPesanan >= 100000){
            return $totalPesanan * (20/100);
        }elseif($status == 'Member' && $totalPesanan < 100000){
            return $totalPesanan * (10/100);
        }else{
            return $totalPesanan * (0/100);
        }
    }
}

// Class total pembayaran
class TotalPembayaran extends Diskon{
    public function TotalPembayaran($status, $totalPesanan){
        return (int)$totalPesanan - (int)$this->diskon($status, $totalPesanan);
    }
}


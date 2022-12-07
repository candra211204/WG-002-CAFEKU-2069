<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Ambil semua data dari tabel kategori
        $data = Kategori::all();

        // Ke halaman tabel kategori
        return view('kategori.tabel', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Ke halaman tambah data kategori
        return view('kategori.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Req semua inputan dari form pengisian tambah data kategori
        Kategori::create($request->all());

        // Ke halaman tabel kategori
        return redirect('kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Find id di tabel kategori
        $data = Kategori::findOrFail($id);

        // Ke halaman edit data kategori
        return view('kategori.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Find id di tabel kategori
        $data = Kategori::findOrFail($id);

        // Update dari semua inputan di form edit kategori
        $data->update($request->all());

        // Ke halaman tabel kategori
        return redirect('kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find id di tabel kategori
        $data = Kategori::findOrFail($id);

        // Hapus data kategori berdasarkan id
        $data->delete();

        // Ke halaman tabel kategori
        return redirect('kategori');
    }
}

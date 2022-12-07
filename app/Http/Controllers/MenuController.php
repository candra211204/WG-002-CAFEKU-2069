<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
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

        // Ke halaman tabel menu
        return view('menu.tabel', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Ambil semua data dari kategori
        $kategori = Kategori::all();

        // Ke halaman tambah data menu
        return view('menu.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validasi isi tabel menu
        $validasi = $request->validate([
            'kategori_id' => 'required',
            'nama' => 'required|string',
            'foto' => 'required|image|max:10000|mimes:jpg,png,svg',
            'harga' => 'required',
            'keterangan' => 'required',
        ]);

        // Membuat folder peletakan untuk foto
        $file = $request->file('foto')->store('artikel/foto');

        // Validasi data foto = $file
        $validasi['foto'] = $file;

        // Membuat data baru di tabel menu
        Menu::create($validasi);

        // Ke halaman tabel menu
        return redirect('menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Find id di tabel menu
        $data = Menu::findOrFail($id);

        //Ambil semua data dari kategori
        $kategori = Kategori::all();

        // Ke halaman edit data menu
        return view('menu.edit', compact('data', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Find id di tabel menu
        $data = Menu::findOrFail($id);
        
        //Validasi isi tabel menu
        $validasi = $request->validate([
            'kategori_id' => 'required',
            'nama' => 'required|string',
            'harga' => 'required',
            'keterangan' => 'required',
        ]);

        // Data update berdasarkan validasi
        $data->update($validasi);

        // Deklarasi
        $fotoLama = Menu::where('id', '=', $id)->first();

        // Pengkondisian foto, jika foto di folder ada maka lakukan aksi hapus
        if($request->file('foto')){
            $foto = public_path('storage/'.$fotoLama->foto);
            if(File::exists($foto)){
                File::delete($foto);
            }
            $file = $request->file('foto')->store('artikel/foto');
            $data->update([
                'foto' => $file
            ]);
        }

        // Ke halaman tabel menu
        return redirect('menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find id di tabel menu
        $data = Menu::findOrFail($id);

        // Deklarasi
        $fotoLama = Menu::where('id', '=', $id)->first();

        // Pengkondisian foto, jika foto di folder ada maka lakukan aksi hapus
        $foto = public_path('storage/'.$fotoLama->foto);
        if(File::exists($foto)){
            File::delete($foto);
        }

        // Hapus data menu berdasarkan id
        $data->delete();

        // Ke halaman tabel menu
        return redirect('menu');
    }
}

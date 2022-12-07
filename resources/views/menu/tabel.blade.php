@extends('layouts.app')

@section('judul', 'Tabel_Manu')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- Flash Message --}}
        @if (Session::has('status'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif

        {{-- Tabel --}}
        <div class="card">
            <div class="card-header">{{ __('Tabel Menu') }}</div>
            <div class="card-body">
                <a class="btn btn-outline-primary mb-5" href="{{ route('menu.create') }}">Tambah Data</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Perulangan isi tabel --}}
                        @foreach ($data as $li)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $li->kategori->nama }}</td>
                            <td>{{ $li->nama }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$li->foto) }}" alt="" width="100">
                            </td>
                            <td>{{ $li->harga }}</td>
                            <td>{{ $li->keterangan }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="{{ url('menu/'.$li->id.'/edit') }}">Edit</a>
                                <a class="btn btn-outline-danger" href="{{ url('hapusMenu/'.$li->id) }}" onclick="return confirm('Yakin mau hapus ?')">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
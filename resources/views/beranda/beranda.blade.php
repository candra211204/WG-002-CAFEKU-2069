@extends('layouts.app')

@section('judul', 'Beranda')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($data as $li)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5><b class="ms-2">Nama Menu : </b>{{ $li->nama }}</h5>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <img src="{{ asset('storage/'.$li->foto) }}" alt="" width="300" height="300">
                    </div>
                    <hr>
                    <h5><b class="ms-2">Kategori : </b>{{ $li->kategori->nama }}</h5>
                    <h5><b class="ms-2">Harga : </b>{{ $li->harga }}</h5>
                    <h5><b class="ms-2">Keterangan : </b>{{ $li->keterangan }}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

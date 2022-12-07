@extends('layouts.app')

@section('judul', 'Tabel_User')

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
            <div class="card-header">{{ __('Tabel User') }}</div>
            <div class="card-body">
                <a class="btn btn-outline-primary mb-5" href="{{ route('user.create') }}">Tambah Data</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Perulangan isi tabel --}}
                        @foreach ($data as $li)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $li->name }}</td>
                            <td>{{ $li->email }}</td>
                            <td>{{ $li->role }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="{{ url('user/'.$li->id.'/edit') }}">Edit</a>
                                <a class="btn btn-outline-danger" href="{{ url('hapusUser/'.$li->id) }}" onclick="return confirm('Yakin mau hapus ?')">Hapus</a>
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
@extends('layouts.app')

@section('judul', 'Tambah_Data_User')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- Form Pengisian --}}
        <div class="card">
            <div class="card-header">{{ __('Tambah Data User ') }}</div>
            <div class="card-body">
                <a class="btn btn-outline-primary mb-5" href="{{ url('user') }}" onclick="return confirm('Yakin batal?, Data yang kamu inputkan mungkin akan hilang')">Kembali</a>
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label class="form-label">Nama</label>
                        <input class="form-control" type="text" name="name" required>
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" required>
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Password</label>
                        <input class="form-control" type="password" name="password" required>
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Pilih Role</label>
                        <select class="form-control" name="role">
                            <option value="Admin">Admin</option>
                            <option value="Owner">Owner</option>
                        </select>
                    </div>
                    <button class="btn btn-outline-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
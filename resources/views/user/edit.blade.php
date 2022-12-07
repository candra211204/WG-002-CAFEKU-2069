@extends('layouts.app')

@section('judul', 'Edit_Data_User')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- Form Pengisian --}}
        <div class="card">
            <div class="card-header">{{ __('Edit Data User ') }}</div>
            <div class="card-body">
                <a class="btn btn-outline-primary mb-5" href="{{ url('user') }}" onclick="return confirm('Yakin batal?, Data yang kamu inputkan mungkin akan hilang')">Kembali</a>
                <form action="{{ url('user/'.$data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-5">
                        <label class="form-label">Nama</label>
                        <input class="form-control" type="text" name="name" value="{{ $data->name }}" required>
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" value="{{ $data->email }}" required>
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Password</label>
                        <input class="form-control" type="password" name="password" placeholder="Masukkan password baru" required>
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Pilih Role Baru</label>
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
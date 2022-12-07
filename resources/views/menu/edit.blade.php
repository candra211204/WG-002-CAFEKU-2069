@extends('layouts.app')

@section('judul', 'Edit_Data_Menu')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- Form Pengisian --}}
        <div class="card">
            <div class="card-header">{{ __('Edit Data Menu ') }}</div>
            <div class="card-body">
                <a class="btn btn-outline-primary mb-5" href="{{ url('menu') }}" onclick="return confirm('Yakin batal?, Data yang kamu inputkan mungkin akan hilang')">Kembali</a>
                <form action="{{ url('menu/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-5">
                        <label class="form-label">Pilih Kategori</label>
                        <select class="form-control" name="kategori_id">
                            @foreach ($kategori as $kt)
                                <option value="{{ $kt->id }}" @selected($data->kategori_id == $kt->id)>{{ $kt->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Nama Menu</label>
                        <input class="form-control" type="text" name="nama" value="{{ $data->nama }}" required>
                    </div>
                    <div class="mb-5">
                        <div>
                            <img src="{{ asset('storage/'.$data->foto) }}" alt="" width="200">
                        </div>
                        <p>Foto Lama</p>
                        <label class="form-label">Foto Baru</label>
                        <input class="form-control" type="file" name="foto" value="{{ $data->foto }}">
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Harga</label>
                        <input class="form-control" type="number" name="harga" value="{{ $data->harga }}" required>
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Ganti Keterangan</label>
                        <select class="form-control" name="keterangan">
                            <option value="Ada">Ada</option>
                            <option value="Habis">Habis</option>
                        </select>
                    </div>
                    <button class="btn btn-outline-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
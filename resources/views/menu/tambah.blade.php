@extends('layouts.app')

@section('judul', 'Tambah_Data_Menu')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- Form Pengisian --}}
        <div class="card">
            <div class="card-header">{{ __('Tambah Data Menu ') }}</div>
            <div class="card-body">
                <a class="btn btn-outline-primary mb-5" href="{{ url('menu') }}" onclick="return confirm('Yakin batal?, Data yang kamu inputkan mungkin akan hilang')">Kembali</a>
                <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-5">
                        <label class="form-label">Pilih Kategori</label>
                        <select class="form-control" name="kategori_id">
                            @foreach ($kategori as $kt)
                                <option value="{{ $kt->id }}">{{ $kt->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Nama Menu</label>
                        <input class="form-control" type="text" name="nama" required>
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Foto</label>
                        <input class="form-control" type="file" name="foto" required>
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Harga</label>
                        <input class="form-control" type="number" name="harga" required>
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Pilih Keterangan</label>
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
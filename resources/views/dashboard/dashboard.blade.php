@extends('layouts.app')

@section('judul', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5>Form Pengisian</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ url('dashboard') }}" method="POST">
                            @csrf
                            <div class="mb-5">
                                <label class="form-label">Nama</label>
                                <input class="form-control" type="text" name="nama" required>
                            </div>
                            <div class="mb-5">
                                <label class="form-label">Pesanan</label>
                                <input class="form-control" type="text" name="pesanan" required>
                            </div>
                            <div class="mb-5">
                                <label class="form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option value="Member">Member</option>
                                    <option value="Bukan Member">Bukan Member</option>
                                </select>
                            </div>
                            <button class="btn btn-outline-primary" type="submit">Submit</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        @isset($data)
                        <form>
                            <div class="mb-5">
                                <label class="form-label">Nama</label>
                                <input class="form-control" type="text" value="{{ $data['hasilNama'] }}" readonly>
                            </div>
                            <div class="mb-5">
                                <label class="form-label">Jumlah Pesanan</label>
                                <input class="form-control" type="text" value="{{ $data['hasilJumlah'] }}" readonly>
                            </div>
                            <div class="mb-5">
                                <label class="form-label">Total Pesanan</label>
                                <input class="form-control" type="text" value="{{ $data['hasilTotal'] }}" readonly>
                            </div>
                            <div class="mb-5">
                                <label class="form-label">Status</label>
                                <input class="form-control" type="text" value="{{ $data['hasilStatus'] }}" readonly>
                            </div>
                            <div class="mb-5">
                                <label class="form-label">Diskon</label>
                                <input class="form-control" type="text" value="{{ $data['hasilDiskon'] }}" readonly>
                            </div>
                            <div class="mb-5">
                                <label class="form-label">Total Pembayaran</label>
                                <input class="form-control" type="text" value="{{ $data['hasilPembayaran'] }}" readonly>
                            </div>
                        </form>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')
@section('title', 'Tambah Member')
@section('page-title', 'Tambah Member')


@section('content')
    <form action="{{ route('member.create.store') }}" method="post" class="card p-3">
        @csrf
        <div class="mb-3"><label>Nama</label><input type="text" name="nama" class="form-control" required></div>
        <div class="mb-3"><label>Username</label><input type="text" name="username" class="form-control" required></div>
        <div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3"><label>No Telp</label><input type="text" name="nomer_telp" class="form-control"></div>
        <div class="mb-3">
            <label>Paket</label>
            <select id="paket" class="form-control @error('paket') is-invalid @enderror" name="paket">
                <option value="">--paket--</option>
                    <option value="1">Paket 1 Rp.100.000</option>
                    <option value="2">Paket 2 Rp.250.000</option>
                    <option value="3">Paket 3 Rp.300.000</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Kasir</label>
            <select id="kasir" class="form-control @error('kasir') is-invalid @enderror" name="kasir">
                <option value="">--Kasir--</option>
                @foreach ($kasirs as $kasir)
                    <option value="{{ $kasir->id }}">{{ $kasir->name }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
@endsection

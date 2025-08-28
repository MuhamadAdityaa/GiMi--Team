@extends('layouts.app')
@section('title','Tambah Kasir')
@section('page-title','Tambah Kasir')

@section('content')
<form action="{{ route('kasir.store') }}" method="post" class="card p-3">
    @csrf
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>No Telp</label>
        <input type="text" name="nomer_telp" class="form-control">
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
@endsection

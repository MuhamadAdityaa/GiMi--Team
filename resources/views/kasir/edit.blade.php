@extends('layouts.app')
@section('title','Edit Kasir')
@section('page-title','Edit Kasir')

@section('content')
<form action="{{ route('kasir.update',$kasir->id ?? 1) }}" method="post" class="card p-3">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $kasir->nama ?? '' }}" required>
    </div>
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="{{ $kasir->username ?? '' }}" required>
    </div>
    <div class="mb-3">
        <label>Password Baru (kosongkan jika tidak diubah)</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="mb-3">
        <label>No Telp</label>
        <input type="text" name="nomer_telp" class="form-control" value="{{ $kasir->nomer_telp ?? '' }}">
    </div>
    <button class="btn btn-success">Update</button>
</form>
@endsection

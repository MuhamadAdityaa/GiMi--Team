@extends('layouts.app')
@section('title', 'Edit Kasir')
@section('page-title', 'Edit Kasir')

@section('content')
    <form action="{{ route('kasir.update', $value->id) }}"" method="post" class="card p-3">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $value->name ?? '' }}" required>
        </div>
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="{{ $value->username ?? '' }}" required>
        </div>
        {{-- <div class="mb-3">
            <label>Password Baru (kosongkan jika tidak diubah)</label>
            <input type="password" name="password" class="form-control" value="{{ $pw }}">
        </div> --}}
        <div class="mb-3">
            <label>No Telp</label>
            <input type="text" name="nomer_telp" class="form-control" value="{{ $value->no_telp ?? '' }}">
        </div>
        <div class="mt-4">
            <a href="{{ route('kasir.index') }}" class="btn btn-secondary">Batal</a>
            <a href="{{ route('kasir.edit.password', $value->id) }}" class="btn btn-secondary">Lupa Password?</a>
            <button class="btn btn-success">Update</button>
        </div>
    </form>
@endsection

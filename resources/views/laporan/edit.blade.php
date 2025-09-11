@extends('layouts.app')
@section('title', 'Edit Kasir')
@section('page-title', 'Edit Kasir')

@section('content')
    <form action="{{ route('laporan.update', $laporan->id) }}" method="post" class="card p-3">
        @csrf
        @method('PUT')
        {{-- <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $value->name ?? '' }}" required>
        </div>
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="{{ $value->username ?? '' }}" required>
        </div> --}}
        {{-- <div class="mb-3">
            <label>Password Baru (kosongkan jika tidak diubah)</label>
            <input type="password" name="password" class="form-control" value="{{ $pw }}">
        </div> --}}
        {{-- <div class="mb-3">
            <label>No Telp</label>
            <input type="text" name="nomer_telp" class="form-control" value="{{ $value->no_telp ?? '' }}">
        </div> --}}

        <div class="mb-3">
            <label>Yang Melayani</label>
            <select id="kasir" class="form-control @error('kasir') is-invalid @enderror" name="kasir">
                <option value="{{ $laporan->kasir_id }}">({{ $laporan->kasir->name }})</option>
                @foreach ($kasir as $k)
                    <option value="{{ $k->id }}">{{ $k->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Batal</a>
            {{-- <a href="{{ route('kasir.edit.password', $value->id) }}" class="btn btn-secondary">Lupa Password?</a> --}}
            <button class="btn btn-success">Update</button>
        </div>
    </form>
@endsection

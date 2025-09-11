@extends('layouts.app')
@section('title', 'Input Laporan Pengunjung')
@section('page-title', 'Input Laporan Pengunjung')


@section('content')
    <form action="{{ route('laporan.create.store') }}" method="post" class="card p-3">
        @csrf
        <div class="mb-3">
            <label>Pilih Kasir</label>
            <select name="kasir_id" class="form-select">
                <option value="">--Pilih Kasir--</option>
                @foreach ($kasir as $k)
                    <option value="{{ $k->id }}">{{ $k->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Batal</a>
            <button class="btn btn-success">Simpan</button>
        </div>
    </form>
@endsection

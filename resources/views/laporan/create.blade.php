@extends('layouts.app')
@section('title','Input Laporan Pengunjung')
@section('page-title','Input Laporan Pengunjung')


@section('content')
<form action="{{ route('laporan.store') }}" method="post" class="card p-3">
@csrf
<div class="mb-3">
<label>Pilih Member</label>
<select name="member_id" class="form-select">
@foreach($members as $m)
<option value="{{ $m->id }}">{{ $m->nama }}</option>
@endforeach
</select>
</div>
<button class="btn btn-success">Simpan</button>
</form>
@endsection
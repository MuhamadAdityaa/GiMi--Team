@extends('layouts.app')
@section('title','Laporan Pengunjung')
@section('page-title','Laporan Pengunjung')


@section('content')
<div class="d-flex justify-content-between mb-3">
<h4>Laporan Pengunjung</h4>
<a href="{{ route('laporan.create') }}" class="btn btn-primary">+ Input Manual</a>
</div>
<table class="table table-striped">
<thead class="table-dark"><tr><th>#</th><th>Member</th><th>Kasir</th><th>Tanggal</th></tr></thead>
<tbody>
@foreach($laporans as $i=>$l)
<tr>
<td>{{ $i+1 }}</td>
<td>{{ $l->member->nama }}</td>
<td>{{ $l->kasir->nama ?? '-' }}</td>
<td>{{ $l->tanggal->format('d/m/Y H:i') }}</td>
</tr>
@endforeach
</tbody>
</table>
@endsection
@extends('layouts.app')
@section('title','Dashboard Kasir')
@section('page-title','Dashboard Kasir')


@section('content')
<h5>Check-in Hari Ini ({{ $kasir->nama }})</h5>
<table class="table table-bordered">
<thead><tr><th>#</th><th>Member</th><th>Waktu</th></tr></thead>
<tbody>
@foreach($today as $i=>$row)
<tr>
<td>{{ $i+1 }}</td>
<td>{{ $row->member->nama }}</td>
<td>{{ $row->tanggal->format('H:i') }}</td>
</tr>
@endforeach
</tbody>
</table>
@endsection
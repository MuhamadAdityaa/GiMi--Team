@extends('layouts.app')
@section('title','Data Kasir')
@section('page-title','Data Kasir')


@section('content')
<div class="d-flex justify-content-between mb-3">
<h4>Data Kasir</h4>
<a href="{{ route('kasir.create') }}" class="btn btn-primary">+ Tambah Kasir</a>
</div>
<table class="table table-hover">
<thead class="table-dark"><tr><th>#</th><th>Nama</th><th>Username</th><th>No Telp</th><th>Aksi</th></tr></thead>
<tbody>
@foreach($kasirs as $i=>$k)
<tr>
<td>{{ $i+1 }}</td>
<td>{{ $k->nama }}</td>
<td>{{ $k->username }}</td>
<td>{{ $k->nomer_telp }}</td>
<td>
<a href="{{ route('kasir.edit',$k) }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route('kasir.destroy',$k) }}" method="post" class="d-inline">
@csrf @method('DELETE')
<button class="btn btn-sm btn-danger" onclick="return confirm('Hapus kasir?')">Hapus</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
@endsection
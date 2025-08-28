@extends('layouts.app')
@section('title','Data Member')
@section('page-title','Data Member')


@section('content')
<div class="d-flex justify-content-between mb-3">
<h4>Data Member</h4>
<a href="{{ route('member.create') }}" class="btn btn-primary">+ Tambah Member</a>
</div>
<table class="table table-hover">
<thead class="table-dark"><tr><th>#</th><th>Nama</th><th>Username</th><th>Paket</th><th>Aksi</th></tr></thead>
<tbody>
@foreach($members as $i=>$m)
<tr>
<td>{{ $i+1 }}</td>
<td>{{ $m->nama }}</td>
<td>{{ $m->username }}</td>
<td>{{ $m->paket }}</td>
<td>
<a href="{{ route('member.edit',$m) }}" class="btn btn-sm btn-warning">Edit</a>
<form action="{{ route('member.destroy',$m) }}" method="post" class="d-inline">
@csrf @method('DELETE')
<button class="btn btn-sm btn-danger" onclick="return confirm('Hapus member?')">Hapus</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
@endsection
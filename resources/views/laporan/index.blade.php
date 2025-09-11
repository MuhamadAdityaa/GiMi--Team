@extends('layouts.app')
@section('title', 'Laporan Pengunjung')
@section('page-title', 'Laporan Pengunjung')


@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>Laporan Pengunjung</h4>
        <a href="{{ route('laporan.create') }}" class="btn btn-primary">+ Input Manual</a>
    </div>
    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Member</th>
                <th>Kasir</th>
                <th>Tanggal</th>
                @if (@session('role') === 'admin')
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($laporan as $i => $l)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $l->member->name ?? '-' }}</td>
                    <td>{{ $l->kasir->name ?? '-' }}</td>
                    <td>{{ $l->tanggal }}</td>
                    @if (@session('role') === 'admin')
                        <td>
                            <a href="{{ route('laporan.showEdit', $l) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('laporan.delete', $l) }}" method="post" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Hapus kasir?')">Hapus</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

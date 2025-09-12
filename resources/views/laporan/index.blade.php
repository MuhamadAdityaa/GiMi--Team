@extends('layouts.app')
@section('title', 'Laporan Pengunjung')
@section('page-title', 'Laporan Pengunjung')


@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>Laporan Pengunjung</h4>
        <a href="{{ route('laporan.create') }}" class="btn btn-primary">+ Input Manual</a>
    </div>
    <!-- Tombol filter -->
    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#filterModal">
        Pilih Tanggal
    </button>
    <a class="btn btn-secondary" href="{{ route('laporan.index') }}">
        Clear Filter
    </a>

    <!-- Modal -->
    <div class="modal fade" id="filterModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="filterForm" method="GET"> <!-- form akan submit ke JS dulu -->
                    <div class="modal-header">
                        <h5 class="modal-title">Pilih Tanggal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="date" name="tanggal" id="filterDate" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Terapkan</button>
                    </div>
                </form>
            </div>
        </div>
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
        <script>
            document.getElementById('filterForm').addEventListener('submit', function(e) {
                e.preventDefault(); // jangan reload page
                const tanggal = document.getElementById('filterDate').value;

                if (!tanggal) {
                    alert('Pilih tanggal dulu!');
                    return;
                }

                // ubah format tanggal ke MM-DD-YYYY kalau mau
                // atau langsung YYYY-MM-DD (sesuai DB)
                const url = `/laporan/filter/${tanggal}`;
                window.location.href = url; // redirect ke URL
            });
        </script>
    @endsection

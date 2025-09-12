@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')


@section('content')
    @if (session('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card text-bg-primary">
                <div class="card-body text-center">
                    <h5>Total Member</h5>
                    <p class="display-6">{{ $member }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-success">
                <div class="card-body text-center">
                    <h5>Total Kasir</h5>
                    <p class="display-6">{{ $kasir }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-warning">
                <div class="card-body text-center">
                    <h5>Check-in
                        @if (isset($periode))
                            @if ($periode === 'today')
                                Hari ini
                            @elseif($periode === 'yesterday')
                                Kemarin
                            @elseif($periode === '7days')
                                7 Hari Terakhir
                            @elseif($periode === '30days')
                                30 Hari Terakhir
                            @else
                                Hari ini
                            @endif
                        @else
                            Hari ini
                        @endif
                    </h5>
                    <p class="display-6">{{ $laporan->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center my-3">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownTanggal" data-bs-toggle="dropdown"
                aria-expanded="false" style="background:#2c2c2c; border:none; border-radius:12px; padding:10px 16px;">
                Pilih Filter
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownTanggal">
                <li><a class="dropdown-item" href="{{ route('dashboard.filter', ['periode' => 'today']) }}">Hari Ini</a>
                </li>
                <li><a class="dropdown-item" href="{{ route('dashboard.filter', ['periode' => 'yesterday']) }}">Kemarin</a>
                </li>
                <li><a class="dropdown-item" href="{{ route('dashboard.filter', ['periode' => '7days']) }}">7 Hari
                        Terakhir</a></li>
                <li><a class="dropdown-item" href="{{ route('dashboard.filter', ['periode' => '30days']) }}">30 Hari
                        Terakhir</a></li>
            </ul>
        </div>
    </div>

    <h5 class="mt-4">Pengunjung Terbaru</h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Member</th>
                <th>Kasir</th>
                <th>Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporan as $l)
                <tr>
                    <td>{{ $l->member->name ?? '-' }}</td>
                    <td>{{ $l->kasir->name ?? '-' }}</td>
                    <td>{{ $l->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

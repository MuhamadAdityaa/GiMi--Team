@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')


@section('content')
    <div class="row g-3">
        <div class="col-md-4">
            <div class="card text-bg-primary">
                <div class="card-body text-center">
                    <h5>Total Member</h5>
                    <p class="display-6"></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-success">
                <div class="card-body text-center">
                    <h5>Total Kasir</h5>
                    <p class="display-6"></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-warning">
                <div class="card-body text-center">
                    <h5>Check-in Hari Ini</h5>
                    <p class="display-6"></p>
                </div>
            </div>
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
            {{-- @foreach ($latest as $l)
                <tr>
                    <td>{{ $l->member->nama }}</td>
                    <td>{{ $l->kasir->nama ?? '-' }}</td>
                    <td>{{ $l->tanggal->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach --}}
        </tbody>
    </table>
@endsection

@extends('layouts.app')
@section('title', 'Edit Member')
@section('page-title', 'Edit Member')

@section('content')
    <form action="#" method="post" class="card p-3">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $member->name ?? '' }}" required>
        </div>
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="{{ $member->username ?? '' }}" required>
        </div>
        {{-- <div class="mb-3">
            <label>Password Baru (kosongkan jika tidak diubah)</label>
            <input type="password" name="password" class="form-control" value="{{ $pw }}">
        </div> --}}
        <div class="mb-3">
            <label>No Telp</label>
            <input type="text" name="nomer_telp" class="form-control" value="{{ $member->no_telp ?? '' }}">
        </div>
        {{-- <div class="mb-3">
            <label>Paket</label>
            <select id="paket" class="form-control @error('paket') is-invalid @enderror" name="paket">
                <option value="{{  }}">--paket--</option>
                <option value="1">Paket 1 Rp.100.000</option>
                <option value="2">Paket 2 Rp.250.000</option>
                <option value="3">Paket 3 Rp.300.000</option>
            </select>
        </div> --}}
        <div class="mt-4">
            
            <a href="{{ route('member.index') }}" class="btn btn-secondary">Batal</a>
            <a href="{{ route('member.edit.password', $member->id) }}" class="btn btn-secondary">Ganti Password?</a>
            <a href="{{ route('member.langganan', $member->id) }}" class="btn btn-primary">Perpanjang Member</a>
            <button class="btn btn-success">Update</button>

        </div>
    </form>
@endsection

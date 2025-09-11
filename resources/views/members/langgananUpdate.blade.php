@extends('layouts.app')
@section('title', 'Edit Kasir')
@section('page-title', 'Edit Kasir')

@section('content')
    <form action="{{ route('member.langganan.update', $member->id) }}"" method="post" class="card p-3">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Paket</label>
            <select id="paket" class="form-control @error('paket') is-invalid @enderror" name="paket">
                <option value="">--paket--</option>
                <option value="1">Paket 1 Rp.100.000</option>
                <option value="2">Paket 2 Rp.250.000</option>
                <option value="3">Paket 3 Rp.300.000</option>
            </select>
        </div>
        <div class="mt-4">
            <a href="{{ route('member.edit', $member->id) }}" class="btn btn-secondary">Batal</a>
            <button class="btn btn-success">Update</button>
        </div>
    </form>
@endsection

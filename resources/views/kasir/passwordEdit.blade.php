@extends('layouts.app')
@section('title', 'Edit Kasir')
@section('page-title', 'Edit Kasir')

@section('content')
    <form action="{{ route('kasir.update.password', $value->id) }}"" method="post" class="card p-3">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Password Baru</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mt-4">
            <a href="{{ route('kasir.showEdit', $value->id) }}" class="btn btn-secondary">Batal</a>
            <button class="btn btn-success">Update</button>
        </div>
    </form>
@endsection

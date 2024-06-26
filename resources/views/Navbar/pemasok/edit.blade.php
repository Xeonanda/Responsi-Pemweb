@extends('layouts.app')

@section('title', 'Edit Pemasok')

@section('content')
    <div class="container">
        <h1 class="mt-4">Edit Pemasok</h1>
        <form action="{{ route('pemasok.update', $pemasok->id) }}" method="POST">
            @csrf
            @method('PUT')
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $pemasok->nama }}" required>
            </div>
            <div class="form-group">
                <label for="contact">Kontak</label>
                <input type="text" name="contact" class="form-control" value="{{ $pemasok->contact }}" required>
            </div>
            <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" name="address" class="form-control" value="{{ $pemasok->address }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

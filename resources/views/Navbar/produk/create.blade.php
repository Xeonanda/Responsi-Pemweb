@extends('layouts.app')

@section('title', 'Create Produk')

@section('content')
    <div class="container">
        <h1 class="mt-4">Create New Produk</h1>
        <form action="{{ route('produk.store') }}" method="POST">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <input type="text" name="description" class="form-control">
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="id_kategori">ID Kategori</label>
                <select name="id_kategori" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_pemasok">ID Pemasok</label>
                <select name="id_pemasok" class="form-control" required>
                    <option value="">Pilih Pemasok</option>
                    @foreach($pemasoks as $pemasok)
                        <option value="{{ $pemasok->id }}">{{ $pemasok->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection

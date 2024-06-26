@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
    <div class="container">
        <h1 class="mt-4">Edit Produk</h1>
        <form action="{{ route('produk.update', $produk->id) }}" method="POST">
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
                <input type="text" name="nama" class="form-control" value="{{ $produk->nama }}" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <input type="text" name="description" class="form-control" value="{{ $produk->description }}">
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" name="price" class="form-control" value="{{ $produk->price }}" required>
            </div>
            <div class="form-group">
                <label for="id_kategori">ID Kategori</label>
                <select name="id_kategori" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ $produk->id_kategori == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="id_pemasok">ID Pemasok</label>
                <select name="id_pemasok" class="form-control" required>
                    <option value="">Pilih Pemasok</option>
                    @foreach($pemasoks as $pemasok)
                        <option value="{{ $pemasok->id }}" {{ $produk->id_pemasok == $pemasok->id ? 'selected' : '' }}>
                            {{ $pemasok->nama }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection

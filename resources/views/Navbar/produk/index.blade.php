@extends('layouts.app')

@section('title', 'Produk')

@section('content')
    <div class="container">
        <h1 class="mt-4">Produk</h1>
        <a class="btn btn-success mb-3" href="{{ route('produk.create') }}">Create New Produk</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>ID Kategori</th>
                    <th>ID Pemasok</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produks as $produk)
                    <tr>
                        <td>{{ $produk->id }}</td>
                        <td>{{ $produk->nama }}</td>
                        <td>{{ $produk->description }}</td>
                        <td>{{ $produk->price }}</td>
                        <td>{{ $produk->id_kategori }}</td>
                        <td>{{ $produk->id_pemasok }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('produk.edit', $produk->id) }}">Edit</a>
                            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

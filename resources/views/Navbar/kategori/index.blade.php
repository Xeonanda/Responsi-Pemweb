@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
    <div class="container">
        <h1 class="mt-4">Kategori</h1>
        <a class="btn btn-success mb-3" href="{{ route('kategori.create') }}">Create New Kategori</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategoris as $kategori)
                    <tr>
                        <td>{{ $kategori->id }}</td>
                        <td>{{ $kategori->nama }}</td>
                        <td>{{ $kategori->description }}</td>
                        <td>{{ $kategori->created_at }}</td>
                        <td>{{ $kategori->updated_at }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('kategori.edit', $kategori->id) }}">Edit</a>
                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

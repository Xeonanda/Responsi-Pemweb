@extends('layouts.app')

@section('title', 'Pemasok')

@section('content')
    <div class="container">
        <h1 class="mt-4">Pemasok</h1>
        <a class="btn btn-success mb-3" href="{{ route('pemasok.create') }}">Create New Pemasok</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kontak</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemasoks as $pemasok)
                    <tr>
                        <td>{{ $pemasok->id }}</td>
                        <td>{{ $pemasok->nama }}</td>
                        <td>{{ $pemasok->contact }}</td>
                        <td>{{ $pemasok->address }}</td>
                        <td>{{ $pemasok->created_at }}</td>
                        <td>{{ $pemasok->updated_at }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('pemasok.edit', $pemasok->id) }}">Edit</a>
                            <form action="{{ route('pemasok.destroy', $pemasok->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pemasok ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

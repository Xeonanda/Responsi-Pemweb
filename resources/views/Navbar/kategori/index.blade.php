@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
    <div class="container">
        <h1 class="mt-4">Kategori</h1>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a class="btn btn-primary" href="{{ route('kategori.create') }}">Create New Kategori</a>
            <form action="{{ route('kategori.index') }}" method="GET" class="form-inline">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request()->get('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <table class="table table-striped table-bordered rounded">
            <thead class="thead-dark">
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
                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <ul class="pagination">
            @if ($kategoris->onFirstPage())
                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $kategoris->previousPageUrl() }}">&laquo;</a></li>
            @endif

            @if ($kategoris->lastPage() >= 7)
                @if ($kategoris->currentPage() > 3)
                    <li class="page-item"><a class="page-link" href="{{ $kategoris->url(1) }}">1</a></li>
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                @endif

                @foreach(range(max($kategoris->currentPage() - 2, 1), min($kategoris->currentPage() + 2, $kategoris->lastPage())) as $page)
                    <li class="page-item {{ ($kategoris->currentPage() == $page) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $kategoris->url($page) }}">{{ $page }}</a>
                    </li>
                @endforeach

                @if ($kategoris->currentPage() < $kategoris->lastPage() - 2)
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                    <li class="page-item"><a class="page-link" href="{{ $kategoris->url($kategoris->lastPage()) }}">{{ $kategoris->lastPage() }}</a></li>
                @endif
            @else
                @for ($i = 1; $i <= $kategoris->lastPage(); $i++)
                    <li class="page-item {{ ($kategoris->currentPage() == $i) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $kategoris->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
            @endif

            @if ($kategoris->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $kategoris->nextPageUrl() }}">&raquo;</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
            @endif
        </ul>
    </div>
@endsection

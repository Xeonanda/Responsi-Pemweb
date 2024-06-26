@extends('layouts.app')

@section('title', 'Pemasok')

@section('content')
    <div class="container">
        <h1 class="mt-4">Pemasok</h1>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a class="btn btn-primary" href="{{ route('pemasok.create') }}">Create New Pemasok</a>
            <form action="{{ route('pemasok.index') }}" method="GET" class="form-inline">
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
                    <th>Kontak</th>
                    <th>Alamat</th>
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
                            <form action="{{ route('pemasok.destroy', $pemasok->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pemasok ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
        <ul class="pagination">

            {{-- Prev Page --}}
            @if ($pemasoks->onFirstPage())
                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $pemasoks->previousPageUrl() }}">&laquo;</a></li>
            @endif

            {{-- Page element --}}
            @if ($pemasoks->lastPage() >= 7)
                @if ($pemasoks->currentPage() > 3)
                    <li class="page-item"><a class="page-link" href="{{ $pemasoks->url(1) }}">1</a></li>
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                @endif

                @foreach(range(max($pemasoks->currentPage() - 2, 1), min($pemasoks->currentPage() + 2, $pemasoks->lastPage())) as $page)
                    <li class="page-item {{ ($pemasoks->currentPage() == $page) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $pemasoks->url($page) }}">{{ $page }}</a>
                    </li>
                @endforeach

                @if ($pemasoks->currentPage() < $pemasoks->lastPage() - 2)
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                    <li class="page-item"><a class="page-link" href="{{ $pemasoks->url($pemasoks->lastPage()) }}">{{ $pemasoks->lastPage() }}</a></li>
                @endif
            @else
                @for ($i = 1; $i <= $pemasoks->lastPage(); $i++)
                    <li class="page-item {{ ($pemasoks->currentPage() == $i) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $pemasoks->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
            @endif

            {{-- Next page --}}
            @if ($pemasoks->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $pemasoks->nextPageUrl() }}">&raquo;</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
            @endif
        </ul>
    </div>
@endsection

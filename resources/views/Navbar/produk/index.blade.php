@extends('layouts.app')

@section('title', 'Produk')

@section('content')
    <div class="container">
        <h1 class="mt-4">Produk</h1>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a class="btn btn-primary" href="{{ route('produk.create') }}">Create New Produk</a>
            <form action="{{ route('produk.index') }}" method="GET" class="form-inline">
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
                    <th>Harga</th>
                    <th>ID Kategori</th>
                    <th>ID Pemasok</th>
                    <th>Created At</th>
                    <th>Updated At</th>
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
                        <td>{{ $produk->created_at }}</td>
                        <td>{{ $produk->updated_at }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('produk.edit', $produk->id) }}">Edit</a>
                            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
        <ul class="pagination">

            {{-- Prev Page --}}
            @if ($produks->onFirstPage())
                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $produks->previousPageUrl() }}">&laquo;</a></li>
            @endif

            {{-- Page element --}}
            @if ($produks->lastPage() >= 7)
                @if ($produks->currentPage() > 3)
                    <li class="page-item"><a class="page-link" href="{{ $produks->url(1) }}">1</a></li>
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                @endif

                @foreach(range(max($produks->currentPage() - 2, 1), min($produks->currentPage() + 2, $produks->lastPage())) as $page)
                    <li class="page-item {{ ($produks->currentPage() == $page) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $produks->url($page) }}">{{ $page }}</a>
                    </li>
                @endforeach

                @if ($produks->currentPage() < $produks->lastPage() - 2)
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                    <li class="page-item"><a class="page-link" href="{{ $produks->url($produks->lastPage()) }}">{{ $produks->lastPage() }}</a></li>
                @endif
            @else
                @for ($i = 1; $i <= $produks->lastPage(); $i++)
                    <li class="page-item {{ ($produks->currentPage() == $i) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $produks->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
            @endif

            {{-- Next page --}}
            @if ($produks->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $produks->nextPageUrl() }}">&raquo;</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
            @endif
        </ul>
    </div>
@endsection

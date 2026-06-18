@extends('layouts.admin')
@section('title', 'Data Buku')
@section('content')

    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0 text-white">Data Buku</h4>

            <a href="{{ route('books.create') }}" class="btn btn-success">
                Tambah Buku
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered align-items-center mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Cover</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Penulis</th>
                                <th>Tahun</th>
                                <th>PDF</th>
                                <th width="180">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($books as $book)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($book->cover_image)
                                            <img src="{{ asset('storage/' . $book->cover_image) }}" width="70"
                                                class="rounded">
                                        @else
                                            -
                                        @endif
                                    </td>

                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->category->name }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->year }}</td>

                                    <td>
                                        <a href="{{ asset('storage/' . $book->pdf_file) }}" target="_blank"
                                            class="btn btn-info btn-sm">
                                            PDF
                                        </a>
                                    </td>

                                    <td>

                                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                            class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button onclick="return confirm('Hapus buku ini?')"
                                                class="btn btn-danger btn-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td colspan="8" class="text-center">
                                        Belum ada data buku
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

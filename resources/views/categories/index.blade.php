@extends('layouts.admin')

@section('title', 'Data Kategori')

@section('content')

    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0 text-white">Data Kategori</h4>

            <a href="{{ route('categories.create') }}" class="btn btn-success">
                Tambah Kategori
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
                                <th width="80">No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th width="180">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        {{ $category->name }}
                                    </td>

                                    <td>
                                        {{ $category->description }}
                                    </td>

                                    <td>

                                        <a href="{{ route('categories.edit', $category->id) }}"
                                            class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                            class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button onclick="return confirm('Hapus kategori ini?')"
                                                class="btn btn-danger btn-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        Belum ada data kategori
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

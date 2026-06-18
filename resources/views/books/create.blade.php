@extends('layouts.admin')
@section('title', 'Tambah Buku')
@section('content')

    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    Tambah Buku
                </h5>
            </div>

            <div class="card-body">
                <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Kategori
                        </label>

                        <select name="category_id" class="form-control">
                            <option value="">
                                Pilih Kategori
                            </option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Buku</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" name="author" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Penerbit</label>
                        <input type="text" name="publisher" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tahun</label>
                        <input type="number" name="year" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" rows="4" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Cover Buku
                        </label>

                        <input type="file" name="cover_image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            File PDF
                        </label>

                        <input type="file" name="pdf_file" class="form-control">
                    </div>

                    <button class="btn btn-primary">
                        Simpan
                    </button>

                    <a href="{{ route('books.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                </form>
            </div>
        </div>
    </div>
@endsection

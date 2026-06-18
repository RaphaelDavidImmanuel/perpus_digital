@extends('layouts.admin')
@section('title', 'Edit Buku')
@section('content')

    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    Edit Buku
                </h5>
            </div>

            <div class="card-body">
                <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label">
                            Kategori
                        </label>

                        <select name="category_id" class="form-control">

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $book->category_id == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}

                                </option>
                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Judul Buku</label>

                        <input type="text" name="title" value="{{ old('title', $book->title) }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Penulis</label>

                        <input type="text" name="author" value="{{ old('author', $book->author) }}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Penerbit</label>

                        <input type="text" name="publisher" value="{{ old('publisher', $book->publisher) }}"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tahun</label>

                        <input type="number" name="year" value="{{ old('year', $book->year) }}" class="form-control">
                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Deskripsi
                        </label>

                        <textarea name="description" rows="5" class="form-control">{{ old('description', $book->description) }}</textarea>

                    </div>

                    @if ($book->cover_image)
                        <div class="mb-3">

                            <label class="form-label">
                                Cover Saat Ini
                            </label>

                            <br>

                            <img src="{{ asset('storage/' . $book->cover_image) }}" width="120" class="rounded border">

                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">
                            Ganti Cover
                        </label>

                        <input type="file" name="cover_image" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            PDF Saat Ini
                        </label>

                        <br>

                        <a href="{{ asset('storage/' . $book->pdf_file) }}" target="_blank" class="btn btn-info btn-sm">
                            Lihat PDF
                        </a>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Ganti PDF
                        </label>
                        <input type="file" name="pdf_file" class="form-control">
                    </div>

                    <button class="btn btn-warning">
                        Update
                    </button>

                    <a href="{{ route('books.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')

    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Kategori</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('categories.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label">
                            Nama Kategori
                        </label>

                        <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}">

                        @error('name')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Deskripsi
                        </label>
                        <textarea name="description" rows="4" class="form-control">{{ old('description', $category->description) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-warning">
                        Update
                    </button>

                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>

                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.user')

@section('title', 'Katalog Buku')

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('catalog.index') }}">
                <div class="row">
                    <div class="col-md-7">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                            placeholder="Cari judul atau penulis...">
                    </div>

                    <div class="col-md-3">
                        <select name="category" class="form-control">

                            <option value="">
                                Semua Kategori
                            </option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button class="btn bg-gradient-primary w-100">
                            Cari
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div class="row">
        @forelse($books as $book)
            <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm">
                    @if ($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top"
                            style="height:300px;object-fit:cover;">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h6 class="mb-1">
                            {{ $book->title }}
                        </h6>

                        <p class="text-sm text-muted mb-2">
                            {{ $book->author }}
                        </p>

                        <span class="badge bg-gradient-info mb-3">
                            {{ $book->category->name }}
                        </span>

                        <a href="{{ route('catalog.show', $book->id) }}" class="btn btn-primary btn-sm mt-auto">
                            Detail Buku
                        </a>
                    </div>
                </div>
            </div>

        @empty

            <div class="col-12">
                <div class="alert alert-warning">
                    Buku tidak ditemukan.
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $books->links() }}
    </div>

@endsection

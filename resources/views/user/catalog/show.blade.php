@extends('layouts.user')

@section('title', $book->title)

@section('content')

    <div class="row">

        <div class="col-md-4">
            <div class="card">
                @if ($book->cover_image)
                    <img src="{{ asset('storage/' . $book->cover_image) }}" class="img-fluid rounded">
                @endif
            </div>
        </div>

        <div class="col-md-8">

            {{-- <div class="card">
                @if ($book->cover_image)
                    <img src="{{ asset('storage/' . $book->cover_image) }}" class="img-fluid rounded">
                @endif
            </div> --}}

            <div class="card">
                <div class="card-body">
                    <h3>
                        {{ $book->title }}
                    </h3>

                    <hr>

                    <p>
                        <strong>Penulis :</strong>
                        {{ $book->author }}
                    </p>

                    <p>
                        <strong>Penerbit :</strong>
                        {{ $book->publisher }}
                    </p>

                    <p>
                        <strong>Tahun :</strong>
                        {{ $book->year }}
                    </p>

                    <p>
                        <strong>Kategori :</strong>
                        {{ $book->category->name }}
                    </p>

                    <div class="mt-4">
                        <a href="{{ route('catalog.read', $book->id) }}" class="btn bg-gradient-success">
                            Baca Buku
                        </a>

                        <a href="{{ route('catalog.download', $book->id) }}" class="btn bg-gradient-primary">
                            Download PDF
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h5>Deskripsi Buku</h5>

            <p class="mb-0">
                {{ $book->description }}
            </p>

        </div>
    </div>
@endsection

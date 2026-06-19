@extends('layouts.user')

@section('title', $book->title)

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    {{ $book->title }}
                </h5>

                <a href="{{ route('catalog.show', $book->id) }}" class="btn btn-secondary btn-sm">
                    Kembali
                </a>
            </div>
        </div>

        <div class="card-body p-0">
            <iframe src="{{ asset('storage/' . $book->pdf_file) }}" width="100%" height="900px" style="border:none;">
            </iframe>

        </div>
    </div>
@endsection

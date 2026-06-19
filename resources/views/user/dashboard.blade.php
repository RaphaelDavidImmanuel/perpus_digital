@extends('layouts.user')

@section('title', 'Dashboard User')

@section('content')

    <div class="row">
        <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                Total Buku
                            </p>

                            <h5 class="font-weight-bolder">
                                {{ $totalBooks }}
                            </h5>
                        </div>

                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center rounded-circle">
                                <i class="ni ni-books text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                Total Kategori
                            </p>

                            <h5 class="font-weight-bolder">
                                {{ $totalCategories }}
                            </h5>
                        </div>

                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow text-center rounded-circle">
                                <i class="ni ni-bullet-list-67 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                Buku Dibaca
                            </p>

                            <h5 class="font-weight-bolder">
                                {{ $totalReadBooks }}
                            </h5>
                        </div>

                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow text-center rounded-circle">
                                <i class="ni ni-single-copy-04 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    {{-- <div class="row mb-4">
        <div class="col-md-6">
            <a href="{{ route('catalog.index') }}" class="btn bg-gradient-primary w-100">
                Jelajahi Buku
            </a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('history') }}" class="btn bg-gradient-success w-100">
                Riwayat Bacaan
            </a>
        </div>
    </div> --}}


    <div class="card">
        <div class="card-header pb-0">
            <h6>Buku Terbaru</h6>
        </div>

        <div class="card-body">
            <div class="row">
                @foreach ($latestBooks as $book)
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border shadow-sm">
                            @if ($book->cover_image)
                                <img src="{{ asset('storage/' . $book->cover_image) }}" class="card-img-top"
                                    style="height:250px; object-fit:cover;">
                            @endif

                            <div class="card-body">
                                <h6 class="mb-1">
                                    {{ $book->title }}
                                </h6>

                                <p class="text-sm text-muted mb-3">
                                    {{ $book->author }}
                                </p>

                                <a href="{{ route('catalog.show', $book->id) }}" class="btn btn-primary btn-sm">
                                    Detail
                                </a>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

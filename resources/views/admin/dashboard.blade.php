@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-4">
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
                                <i class="ni ni-books text-lg opacity-10 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-4">
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
                                <i class="ni ni-tag text-lg opacity-10 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                Total User
                            </p>

                            <h5 class="font-weight-bolder">
                                {{ $totalUsers }}
                            </h5>
                        </div>

                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow text-center rounded-circle">
                                <i class="ni ni-single-02 text-lg opacity-10 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                Total Dibaca
                            </p>

                            <h5 class="font-weight-bolder">
                                {{ $totalViews }}
                            </h5>
                        </div>

                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow text-center rounded-circle">
                                <i class="ni ni-chart-bar-32 text-lg opacity-10 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">

            <div class="col-lg-12">

                <div class="card">

                    <div class="card-header pb-0">
                        <h6>Buku Terpopuler</h6>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Buku</th>
                                        <th>Total Dibaca</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($popularBooks as $book)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>
                                                {{ $book->title }}
                                            </td>

                                            <td>
                                                {{ $book->total_views }}
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

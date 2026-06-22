<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .hero {
            min-height: 85vh;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            color: white;
            display: flex;
            align-items: center;
        }

        .hero img {
            max-width: 100%;
        }

        .stats-card {
            border: none;
            border-radius: 15px;
            transition: .3s;
        }

        .stats-card:hover {
            transform: translateY(-5px);
        }

        .category-card {
            border: none;
            border-radius: 15px;
            transition: .3s;
        }

        .category-card:hover {
            transform: translateY(-5px);
        }

        .book-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: .3s;
        }

        .book-card:hover {
            transform: translateY(-5px);
        }

        .book-cover {
            height: 300px;
            object-fit: cover;
        }

        footer {
            background: #212529;
            color: white;
        }
    </style>
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">

            <a class="navbar-brand fw-bold" href="/">
                Perpus Digital
            </a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                Katalog
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                Login
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="btn btn-primary ms-lg-2" href="{{ route('register') }}">
                                Register
                            </a>
                        </li>
                    @endguest

                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('catalog.index') }}">
                                Katalog
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="btn btn-success ms-lg-2" href="{{ route('dashboard') }}">
                                Dashboard
                            </a>
                        </li>
                    @endauth

                </ul>

            </div>
        </div>
    </nav>

    {{-- Hero --}}
    <section class="hero">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-6">
                    <h1 class="display-3 fw-bold mb-4">
                        Perpustakaan Digital
                    </h1>

                    <p class="lead mb-4">
                        Akses koleksi buku teknologi, pendidikan, sejarah,
                        bisnis, sains, dan novel kapan saja dan di mana saja.
                    </p>

                    @guest
                        <a href="{{ route('register') }}" class="btn btn-light btn-lg">
                            Mulai Membaca
                        </a>
                    @else
                        <a href="{{ route('catalog.index') }}" class="btn btn-light btn-lg">
                            Jelajahi Katalog
                        </a>
                    @endguest
                </div>

                {{-- <div class="col-lg-6 text-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/3145/3145765.png" alt="Perpustakaan Digital">
                </div> --}}

            </div>

        </div>

    </section>

    {{-- Statistik --}}
    <section class="py-5">

        <div class="container">

            <div class="row g-4">

                <div class="col-md-4">
                    <div class="card stats-card shadow text-center p-4">
                        <h1 class="text-primary">{{ $totalBooks }}</h1>
                        <h3>Total Buku</h3>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card stats-card shadow text-center p-4">
                        <h1 class="text-success">{{ $totalCategories }}</h1>
                        <h3>Kategori</h3>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card stats-card shadow text-center p-4">
                        <h1 class="text-warning">{{ $totalUsers }}</h1>
                        <h3>Pengguna</h3>
                    </div>
                </div>

            </div>

        </div>

    </section>

    {{-- Kategori --}}
    <section class="py-5 bg-white">

        <div class="container">

            <h2 class="text-center fw-bold mb-5">
                Kategori Buku
            </h2>

            <div class="row g-4">

                @foreach ($categories as $category)
                    <div class="col-md-3">

                        <div class="card category-card shadow h-100">

                            <div class="card-body text-center">

                                <h5 class="fw-bold">
                                    {{ $category->name }}
                                </h5>

                                <p class="text-muted">
                                    {{ Str::limit($category->description, 80) }}
                                </p>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </section>

    {{-- Buku Terbaru --}}
    <section class="py-5">

        <div class="container">

            <h2 class="text-center fw-bold mb-5">
                Koleksi Terbaru
            </h2>

            <div class="row g-4">

                @foreach ($books as $book)
                    <div class="col-md-4 col-lg-2">

                        <div class="card book-card shadow h-100">

                            <img src="{{ asset('storage/' . $book->cover_image) }}" class="book-cover card-img-top">

                            <div class="card-body">

                                <h6 class="fw-bold">
                                    {{ Str::limit($book->title, 30) }}
                                </h6>

                                <small class="text-muted">
                                    {{ $book->author }}
                                </small>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </section>

    {{-- CTA --}}
    <section class="py-5 text-center text-white" style="background: linear-gradient(135deg,#2563eb,#7c3aed);">

        <div class="container">

            <h2 class="fw-bold mb-3">
                Mulai Membaca Sekarang
            </h2>

            <p class="lead">
                Daftar akun dan akses seluruh koleksi buku digital.
            </p>

            @guest
                <a href="{{ route('register') }}" class="btn btn-light btn-lg">
                    Daftar Gratis
                </a>
            @endguest

        </div>

    </section>


    <footer class="py-4">
        <div class="container text-center">
            <p class="mb-0">
                © {{ date('Y') }} Perpustakaan Digital - Dibuat dengan Laravel 10
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

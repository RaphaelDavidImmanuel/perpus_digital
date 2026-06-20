@extends('layouts.user')

@section('title', 'Profile Saya')

@section('content')
    <div class="row">
        {{-- Card Edit Nama --}}
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <i class="ni ni-single-02 text-primary me-2" style="font-size: 1.2rem;"></i>
                        <h6 class="mb-0">Informasi Profil</h6>
                    </div>
                    <p class="text-sm text-muted mt-1 mb-0">Perbarui nama akun Anda.</p>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-icon"><i class="ni ni-check-bold"></i></span>
                            <span class="alert-text">{{ session('success') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('user.profile.update-name') }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="name" class="form-control-label">Nama</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-control-label">Email</label>
                            <input type="email" id="email" class="form-control" value="{{ $user->email }}" disabled>
                            <small class="text-muted">Email tidak dapat diubah.</small>
                        </div>

                        <button type="submit" class="btn bg-gradient-primary btn-sm mt-2">
                            <i class="ni ni-check-bold me-1"></i> Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Card Ubah Password --}}
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <i class="ni ni-lock-circle-open text-warning me-2" style="font-size: 1.2rem;"></i>
                        <h6 class="mb-0">Ubah Password</h6>
                    </div>
                    <p class="text-sm text-muted mt-1 mb-0">Pastikan akun Anda menggunakan password yang kuat.</p>
                </div>
                <div class="card-body">
                    @if (session('success_password'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="alert-icon"><i class="ni ni-check-bold"></i></span>
                            <span class="alert-text">{{ session('success_password') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('user.profile.update-password') }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="current_password" class="form-control-label">Password Saat Ini</label>
                            <input type="password" id="current_password" name="current_password"
                                class="form-control @error('current_password') is-invalid @enderror" required>
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-control-label">Password Baru</label>
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="form-control-label">Konfirmasi Password Baru</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control" required>
                        </div>

                        <button type="submit" class="btn bg-gradient-warning btn-sm mt-2">
                            <i class="ni ni-key-25 me-1"></i> Ubah Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

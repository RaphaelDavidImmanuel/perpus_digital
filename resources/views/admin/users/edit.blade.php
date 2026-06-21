@extends('layouts.admin')
@section('title', 'Edit User')
@section('content')

    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0 text-white">Edit User: {{ $user->name }}</h4>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                <i class="ni ni-bold-left me-1"></i> Kembali
            </a>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <h6 class="mb-0">Informasi User</h6>
                        <p class="text-sm text-muted mb-0">Ubah nama dan/atau password user. Kosongkan password jika tidak ingin mengubah.</p>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name" class="form-control-label">Nama</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" class="form-control-label">Email</label>
                                <input type="email" id="email" class="form-control" value="{{ $user->email }}" disabled>
                                <small class="text-muted">Email tidak dapat diubah oleh admin.</small>
                            </div>

                            <div class="form-group">
                                <label for="password" class="form-control-label">Password Baru</label>
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Kosongkan jika tidak ingin mengubah">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation" class="form-control-label">Konfirmasi Password Baru</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control" placeholder="Ketik ulang password baru">
                            </div>

                            <div class="d-flex gap-2 mt-3">
                                <button type="submit" class="btn bg-gradient-primary">
                                    <i class="ni ni-check-bold me-1"></i> Simpan Perubahan
                                </button>
                                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body text-center py-4">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=5e72e4&color=fff&size=120"
                            class="rounded-circle mb-3" style="width: 100px; height: 100px;">
                        <h6 class="mb-0">{{ $user->name }}</h6>
                        <p class="text-sm text-muted">{{ $user->email }}</p>
                        <span class="badge bg-gradient-info">{{ ucfirst($user->role) }}</span>
                        <p class="text-xs text-muted mt-3 mb-0">
                            Bergabung: {{ $user->created_at->format('d M Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

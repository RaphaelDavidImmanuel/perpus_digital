<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Nama --}}
        <div class="form-group">
            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}" required autofocus autocomplete="name"
                placeholder="Masukkan nama lengkap">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Email --}}
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}" required autocomplete="username"
                placeholder="nama@email.com">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Password --}}
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
                required autocomplete="new-password"
                placeholder="Minimal 8 karakter">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Konfirmasi Password --}}
        <div class="form-group">
            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="form-control" required autocomplete="new-password"
                placeholder="Ketik ulang password">
        </div>

        {{-- Submit --}}
        <button type="submit" class="btn-auth">
            <i class="ni ni-circle-08 me-2"></i> Daftar
        </button>

        {{-- Login Link --}}
        <div class="auth-footer">
            <span>Sudah punya akun?</span>
            <a href="{{ route('login') }}"> Masuk di sini</a>
        </div>
    </form>
</x-guest-layout>

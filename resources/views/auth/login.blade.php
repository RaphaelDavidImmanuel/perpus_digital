<x-guest-layout>
    {{-- Session Status --}}
    @if (session('status'))
        <div class="alert-auth">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}" required autofocus autocomplete="username"
                placeholder="nama@email.com">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Password --}}
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
                required autocomplete="current-password"
                placeholder="••••••••">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>



        {{-- Submit --}}
        <button type="submit" class="btn-auth">
            <i class="ni ni-key-25 me-2"></i> Masuk
        </button>

        {{-- Register Link --}}
        <div class="auth-footer">
            <span>Belum punya akun?</span>
            <a href="{{ route('register') }}"> Daftar sekarang</a>
        </div>
    </form>
</x-guest-layout>

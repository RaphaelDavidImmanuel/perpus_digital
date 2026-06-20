<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Perpustakaan Digital') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Argon Dashboard CSS -->
        <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Open Sans', sans-serif;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                background: linear-gradient(135deg, #172b4d 0%, #1a174d 50%, #5e72e4 100%);
                position: relative;
                /* Mengizinkan scroll vertikal jika form terlalu panjang */
                overflow-y: auto;
                overflow-x: hidden;
                padding: 40px 0;
            }

            body::before {
                content: '';
                /* Gunakan fixed agar background tetap di posisinya saat di-scroll */
                position: fixed;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background:
                    radial-gradient(ellipse at 20% 50%, rgba(94, 114, 228, 0.15) 0%, transparent 50%),
                    radial-gradient(ellipse at 80% 20%, rgba(45, 206, 137, 0.1) 0%, transparent 50%),
                    radial-gradient(ellipse at 50% 80%, rgba(251, 99, 64, 0.08) 0%, transparent 50%);
                animation: bgShift 15s ease-in-out infinite alternate;
            }

            @keyframes bgShift {
                0% { transform: translate(0, 0) rotate(0deg); }
                100% { transform: translate(-2%, -2%) rotate(3deg); }
            }

            .auth-wrapper {
                position: relative;
                z-index: 1;
                width: 100%;
                max-width: 480px;
                padding: 20px;
            }

            .auth-brand {
                text-align: center;
                margin-bottom: 32px;
            }

            .auth-brand .brand-icon {
                width: 64px;
                height: 64px;
                background: rgba(255, 255, 255, 0.15);
                backdrop-filter: blur(10px);
                border-radius: 16px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 16px;
                border: 1px solid rgba(255, 255, 255, 0.2);
                transition: transform 0.3s ease;
            }

            .auth-brand .brand-icon:hover {
                transform: translateY(-3px);
            }

            .auth-brand .brand-icon i {
                font-size: 28px;
                color: #fff;
            }

            .auth-brand h2 {
                color: #fff;
                font-size: 1.5rem;
                font-weight: 700;
                margin-bottom: 4px;
                letter-spacing: -0.5px;
            }

            .auth-brand p {
                color: rgba(255, 255, 255, 0.6);
                font-size: 0.875rem;
                font-weight: 400;
            }

            .auth-card {
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(20px);
                border-radius: 20px;
                padding: 40px;
                box-shadow:
                    0 20px 60px rgba(0, 0, 0, 0.3),
                    0 0 0 1px rgba(255, 255, 255, 0.1),
                    inset 0 1px 0 rgba(255, 255, 255, 0.8);
                animation: cardSlideUp 0.6s ease-out;
            }

            @keyframes cardSlideUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .auth-card .form-group {
                margin-bottom: 20px;
            }

            .auth-card label {
                display: block;
                font-size: 0.8rem;
                font-weight: 600;
                color: #344767;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                margin-bottom: 8px;
            }

            .auth-card .form-control {
                width: 100%;
                padding: 12px 16px;
                border: 1.5px solid #e2e8f0;
                border-radius: 10px;
                font-size: 0.9rem;
                color: #344767;
                background: #f8f9fa;
                transition: all 0.3s ease;
                outline: none;
                font-family: 'Open Sans', sans-serif;
            }

            .auth-card .form-control:focus {
                border-color: #5e72e4;
                background: #fff;
                box-shadow: 0 0 0 3px rgba(94, 114, 228, 0.15);
            }

            .auth-card .form-control.is-invalid {
                border-color: #f5365c;
            }

            .auth-card .invalid-feedback {
                display: block;
                color: #f5365c;
                font-size: 0.78rem;
                margin-top: 6px;
            }

            .auth-card .btn-auth {
                width: 100%;
                padding: 13px;
                border: none;
                border-radius: 10px;
                font-size: 0.9rem;
                font-weight: 600;
                color: #fff;
                background: linear-gradient(135deg, #5e72e4 0%, #825ee4 100%);
                cursor: pointer;
                transition: all 0.3s ease;
                text-transform: uppercase;
                letter-spacing: 1px;
                font-family: 'Open Sans', sans-serif;
                position: relative;
                overflow: hidden;
            }

            .auth-card .btn-auth:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(94, 114, 228, 0.4);
            }

            .auth-card .btn-auth:active {
                transform: translateY(0);
            }

            .auth-card .auth-footer {
                text-align: center;
                margin-top: 24px;
                padding-top: 20px;
                border-top: 1px solid #e9ecef;
            }

            .auth-card .auth-footer a {
                color: #5e72e4;
                text-decoration: none;
                font-weight: 600;
                font-size: 0.875rem;
                transition: color 0.2s;
            }

            .auth-card .auth-footer a:hover {
                color: #324cdd;
            }

            .auth-card .auth-footer span {
                color: #8898aa;
                font-size: 0.875rem;
            }

            .remember-row {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 24px;
            }

            .remember-row label {
                display: flex;
                align-items: center;
                gap: 8px;
                text-transform: none;
                font-weight: 400;
                font-size: 0.85rem;
                color: #525f7f;
                cursor: pointer;
                margin-bottom: 0;
            }

            .remember-row input[type="checkbox"] {
                width: 18px;
                height: 18px;
                accent-color: #5e72e4;
                cursor: pointer;
            }

            .remember-row a {
                color: #5e72e4;
                text-decoration: none;
                font-size: 0.85rem;
                font-weight: 600;
            }

            .remember-row a:hover {
                color: #324cdd;
            }

            .alert-auth {
                padding: 12px 16px;
                border-radius: 10px;
                font-size: 0.85rem;
                margin-bottom: 20px;
                background: #d4edda;
                color: #155724;
                border: 1px solid #c3e6cb;
            }

            /* Floating particles */
            .particle {
                position: fixed;
                border-radius: 50%;
                opacity: 0.15;
                pointer-events: none;
                animation: floatUp linear infinite;
            }

            @keyframes floatUp {
                0% {
                    transform: translateY(100vh) scale(0);
                    opacity: 0;
                }
                10% {
                    opacity: 0.15;
                }
                90% {
                    opacity: 0.15;
                }
                100% {
                    transform: translateY(-10vh) scale(1);
                    opacity: 0;
                }
            }
        </style>
    </head>
    <body>
        <!-- Floating Particles -->
        <div class="particle" style="width: 6px; height: 6px; background: #fff; left: 10%; animation-duration: 12s; animation-delay: 0s;"></div>
        <div class="particle" style="width: 4px; height: 4px; background: #5e72e4; left: 20%; animation-duration: 15s; animation-delay: 2s;"></div>
        <div class="particle" style="width: 8px; height: 8px; background: #2dce89; left: 35%; animation-duration: 18s; animation-delay: 4s;"></div>
        <div class="particle" style="width: 5px; height: 5px; background: #fff; left: 50%; animation-duration: 14s; animation-delay: 1s;"></div>
        <div class="particle" style="width: 7px; height: 7px; background: #fb6340; left: 65%; animation-duration: 16s; animation-delay: 3s;"></div>
        <div class="particle" style="width: 4px; height: 4px; background: #fff; left: 80%; animation-duration: 13s; animation-delay: 5s;"></div>
        <div class="particle" style="width: 6px; height: 6px; background: #5e72e4; left: 90%; animation-duration: 17s; animation-delay: 0.5s;"></div>

        <div class="auth-wrapper">
            <div class="auth-brand">
                <div class="brand-icon">
                    <i class="ni ni-books"></i>
                </div>
                <h2>Perpustakaan Digital</h2>
                <p>Akses ribuan buku dalam genggaman Anda</p>
            </div>

            <div class="auth-card">
                {{ $slot }}
            </div>
        </div>

        <!-- Nucleo Icons CSS (for ni- icons) -->
        <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    </body>
</html>

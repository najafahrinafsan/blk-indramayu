@extends('layouts.app')

@section('title', 'Login Admin')

@section('content')

<style>
    .login-page {
        min-height: 100vh;
        background:
            radial-gradient(circle at top left, rgba(13, 110, 253, .12), transparent 35%),
            radial-gradient(circle at bottom right, rgba(25, 135, 84, .10), transparent 35%),
            #f4f7fb;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
    }

    .login-wrapper {
        width: 100%;
        max-width: 1050px;
    }

    .login-card {
        background: #fff;
        border: 0;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(15, 23, 42, .12);
    }

    /* LEFT SIDE */
    .login-info {
        height: 100%;
        min-height: 600px;
        padding: 55px 45px;
        background: linear-gradient(145deg, #0d6efd, #084298);
        color: #fff;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .login-info::before {
        content: "";
        position: absolute;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        background: rgba(255,255,255,.08);
        top: -90px;
        right: -90px;
    }

    .login-info::after {
        content: "";
        position: absolute;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background: rgba(255,255,255,.06);
        bottom: -80px;
        left: -80px;
    }

    .login-logo {
        position: relative;
        z-index: 2;
        background: rgba(255,255,255,.12);
        border: 1px solid rgba(255,255,255,.2);
        width: 90px;
        height: 90px;
        border-radius: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 30px;
        backdrop-filter: blur(10px);
    }

    .login-logo img {
        width: 68px;
        max-height: 68px;
        object-fit: contain;
    }

    .login-info h1 {
        position: relative;
        z-index: 2;
        font-size: 34px;
        line-height: 1.25;
        font-weight: 800;
        margin-bottom: 18px;
    }

    .login-info p {
        position: relative;
        z-index: 2;
        color: rgba(255,255,255,.82);
        font-size: 16px;
        line-height: 1.7;
        margin-bottom: 30px;
    }

    .login-feature {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        gap: 13px;
        margin-bottom: 16px;
        color: rgba(255,255,255,.92);
    }

    .login-feature-icon {
        width: 38px;
        height: 38px;
        border-radius: 11px;
        background: rgba(255,255,255,.13);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    /* RIGHT SIDE */
    .login-form-section {
        min-height: 600px;
        padding: 55px 50px;
        display: flex;
        align-items: center;
        background: #fff;
    }

    .login-form {
        width: 100%;
        max-width: 430px;
        margin: auto;
    }

    .login-heading {
        margin-bottom: 32px;
    }

    .login-heading .icon {
        width: 52px;
        height: 52px;
        border-radius: 15px;
        background: rgba(13, 110, 253, .1);
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 18px;
    }

    .login-heading h2 {
        font-size: 28px;
        font-weight: 800;
        color: #172033;
        margin-bottom: 8px;
    }

    .login-heading p {
        color: #6c757d;
        margin: 0;
    }

    .alert {
        border: 0;
        border-radius: 13px;
        padding: 13px 15px;
        font-size: 14px;
    }

    .alert ul {
        padding-left: 20px;
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-label {
        color: #253047;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .input-wrapper {
        position: relative;
    }

    .input-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #8a94a6;
        font-size: 17px;
        z-index: 3;
    }

    .login-input {
        height: 52px;
        border-radius: 12px;
        border: 1px solid #dfe4ea;
        padding-left: 46px;
        padding-right: 45px;
        font-size: 14px;
        transition: all .2s ease;
        box-shadow: none;
    }

    .login-input:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 4px rgba(13, 110, 253, .10);
    }

    .password-toggle {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        border: 0;
        background: transparent;
        color: #8a94a6;
        padding: 5px;
        cursor: pointer;
        z-index: 3;
    }

    .password-toggle:hover {
        color: #0d6efd;
    }

    .login-button {
        height: 53px;
        border: 0;
        border-radius: 12px;
        font-size: 15px;
        box-shadow: 0 8px 20px rgba(13, 110, 253, .22);
        transition: all .2s ease;
    }

    .login-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(13, 110, 253, .28);
    }

    .back-home {
        color: #6c757d;
        font-size: 14px;
        transition: .2s ease;
    }

    .back-home:hover {
        color: #0d6efd;
    }

    .security-note {
        margin-top: 25px;
        padding: 13px 15px;
        border-radius: 12px;
        background: #f8f9fa;
        color: #6c757d;
        font-size: 12px;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .security-note i {
        color: #198754;
        font-size: 16px;
    }

    @media (max-width: 991px) {
        .login-info {
            min-height: auto;
            padding: 40px;
        }

        .login-form-section {
            min-height: auto;
            padding: 45px 35px;
        }
    }

    @media (max-width: 767px) {
        .login-page {
            padding: 20px 15px;
        }

        .login-card {
            border-radius: 18px;
        }

        .login-info {
            padding: 35px 25px;
        }

        .login-info h1 {
            font-size: 27px;
        }

        .login-info p {
            font-size: 14px;
        }

        .login-feature {
            font-size: 14px;
        }

        .login-form-section {
            padding: 35px 25px;
        }

        .login-heading h2 {
            font-size: 24px;
        }
    }
</style>

<div class="login-page">

    <div class="login-wrapper">

        <div class="login-card">

            <div class="row g-0">

                {{-- =========================
                    BAGIAN INFORMASI
                ========================== --}}
                <div class="col-lg-6">

                    <div class="login-info">

                        <div class="login-logo">
                            <img
                                src="{{ asset('assets/image/logo.png') }}"
                                alt="Logo BLK Kabupaten Indramayu"
                            >
                        </div>

                        <h1>
                            Selamat Datang di
                            Panel Administrator
                        </h1>

                        <p>
                            Kelola informasi, pelatihan, pendaftar,
                            galeri, pengumuman, alumni, dan pesan
                            website BLK Kabupaten Indramayu
                            melalui panel administrator.
                        </p>

                        <div class="login-feature">
                            <div class="login-feature-icon">
                                <i class="bi bi-speedometer2"></i>
                            </div>
                            <span>Dashboard administrasi yang mudah digunakan</span>
                        </div>

                        <div class="login-feature">
                            <div class="login-feature-icon">
                                <i class="bi bi-database-check"></i>
                            </div>
                            <span>Kelola data website secara terpusat</span>
                        </div>

                        <div class="login-feature">
                            <div class="login-feature-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <span>Akses khusus untuk administrator</span>
                        </div>

                    </div>

                </div>


                {{-- =========================
                    BAGIAN FORM LOGIN
                ========================== --}}
                <div class="col-lg-6">

                    <div class="login-form-section">

                        <div class="login-form">

                            <div class="login-heading">

                                <div class="icon">
                                    <i class="bi bi-person-lock"></i>
                                </div>

                                <h2>
                                    Login Administrator
                                </h2>

                                <p>
                                    Masuk untuk mengakses panel admin.
                                </p>

                            </div>


                            {{-- ERROR SESSION --}}
                            @if(session('error'))

                                <div class="alert alert-danger mb-4">
                                    <i class="bi bi-exclamation-circle-fill me-2"></i>
                                    {{ session('error') }}
                                </div>

                            @endif


                            {{-- SUCCESS SESSION --}}
                            @if(session('success'))

                                <div class="alert alert-success mb-4">
                                    <i class="bi bi-check-circle-fill me-2"></i>
                                    {{ session('success') }}
                                </div>

                            @endif


                            {{-- ERROR VALIDASI --}}
                            @if($errors->any())

                                <div class="alert alert-danger mb-4">

                                    <div class="fw-semibold mb-1">
                                        <i class="bi bi-exclamation-triangle-fill me-1"></i>
                                        Terdapat kesalahan
                                    </div>

                                    <ul class="mb-0">

                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach

                                    </ul>

                                </div>

                            @endif


                            <form
                                action="{{ route('admin.login.process') }}"
                                method="POST"
                            >

                                @csrf


                                {{-- EMAIL --}}
                                <div class="form-group">

                                    <label
                                        for="email"
                                        class="form-label fw-semibold"
                                    >
                                        Email Administrator
                                    </label>

                                    <div class="input-wrapper">

                                        <i class="bi bi-envelope input-icon"></i>

                                        <input
                                            type="email"
                                            id="email"
                                            name="email"
                                            class="form-control login-input"
                                            placeholder="Masukkan email admin"
                                            value="{{ old('email') }}"
                                            autocomplete="email"
                                            required
                                        >

                                    </div>

                                </div>


                                {{-- PASSWORD --}}
                                <div class="form-group">

                                    <label
                                        for="password"
                                        class="form-label fw-semibold"
                                    >
                                        Password
                                    </label>

                                    <div class="input-wrapper">

                                        <i class="bi bi-lock input-icon"></i>

                                        <input
                                            type="password"
                                            id="password"
                                            name="password"
                                            class="form-control login-input"
                                            placeholder="Masukkan password"
                                            autocomplete="current-password"
                                            required
                                        >

                                        <button
                                            type="button"
                                            class="password-toggle"
                                            id="togglePassword"
                                            aria-label="Tampilkan password"
                                        >
                                            <i class="bi bi-eye" id="passwordIcon"></i>
                                        </button>

                                    </div>

                                </div>


                                {{-- LOGIN BUTTON --}}
                                <button
                                    type="submit"
                                    class="btn btn-primary w-100 fw-bold login-button"
                                >
                                    <i class="bi bi-box-arrow-in-right me-2"></i>
                                    Masuk ke Panel Admin
                                </button>

                            </form>


                            {{-- SECURITY NOTE --}}
                            <div class="security-note">

                                <i class="bi bi-shield-lock-fill"></i>

                                <span>
                                    Halaman ini hanya dapat diakses oleh
                                    administrator yang memiliki akun resmi.
                                </span>

                            </div>


                            {{-- BACK HOME --}}
                            <div class="text-center mt-4">

                                <a
                                    href="{{ url('/') }}"
                                    class="text-decoration-none back-home"
                                >
                                    <i class="bi bi-arrow-left me-1"></i>
                                    Kembali ke Beranda
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="text-center mt-4 text-muted small">
            © {{ date('Y') }} BLK Kabupaten Indramayu
        </div>

    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const passwordIcon = document.getElementById('passwordIcon');

        if (togglePassword && passwordInput && passwordIcon) {

            togglePassword.addEventListener('click', function () {

                const isPassword =
                    passwordInput.getAttribute('type') === 'password';

                passwordInput.setAttribute(
                    'type',
                    isPassword ? 'text' : 'password'
                );

                passwordIcon.classList.toggle(
                    'bi-eye',
                    !isPassword
                );

                passwordIcon.classList.toggle(
                    'bi-eye-slash',
                    isPassword
                );

            });

        }

    });
</script>

@endsection
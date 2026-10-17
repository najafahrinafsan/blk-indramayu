@extends('layouts.app')

@section('title', 'Data Alumni')

@section('content')

<style>
    body {
        background: #f5f7fb;
    }

    .admin-navbar {
        background: linear-gradient(135deg, #0d6efd, #0b5ed7);
    }

    .page-header {
        background: linear-gradient(135deg, #ffffff, #f8fbff);
        border: 1px solid #e8eef5;
        border-radius: 20px;
    }

    .stat-card {
        border: none;
        border-radius: 18px;
        transition: .3s;
    }

    .stat-card:hover {
        transform: translateY(-3px);
    }

    .icon-box {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .alumni-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        transition: .3s;
        height: 100%;
    }

    .alumni-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, .08) !important;
    }

    .alumni-image {
        width: 100%;
        height: 220px;
        object-fit: cover;
        background: #eef2f7;
    }

    .image-placeholder {
        width: 100%;
        height: 220px;
        background: linear-gradient(135deg, #eef2f7, #dfe7f0);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #8a99aa;
        font-size: 55px;
    }

    .description {
        color: #6c757d;
        line-height: 1.7;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 81px;
    }

    .btn-action {
        border-radius: 10px;
        padding: 8px 13px;
    }

    .empty-state {
        border-radius: 20px;
        border: 2px dashed #dce3eb;
        background: #fff;
        padding: 70px 20px;
    }

    .pagination {
        margin-bottom: 0;
    }
</style>

{{-- NAVBAR --}}
<nav class="navbar navbar-dark admin-navbar shadow-sm">
    <div class="container-fluid px-4">

        <a
            href="{{ route('admin.dashboard') }}"
            class="navbar-brand fw-bold"
        >
            <i class="bi bi-speedometer2 me-2"></i>
            Admin BLK Indramayu
        </a>

        <div class="d-flex align-items-center gap-2">

            <a
                href="{{ route('admin.dashboard') }}"
                class="btn btn-light btn-sm"
            >
                <i class="bi bi-house-door me-1"></i>
                Dashboard
            </a>

            <form
                action="{{ route('admin.logout') }}"
                method="POST"
                class="d-inline"
            >
                @csrf

                <button
                    type="submit"
                    class="btn btn-outline-light btn-sm"
                >
                    <i class="bi bi-box-arrow-right me-1"></i>
                    Logout
                </button>
            </form>

        </div>
    </div>
</nav>

<div class="container-fluid px-4 py-4">

    {{-- HEADER --}}
    <div class="page-header shadow-sm p-4 mb-4">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">

            <div>
                <div class="text-primary fw-semibold mb-1">
                    <i class="bi bi-people-fill me-1"></i>
                    MANAJEMEN ALUMNI
                </div>

                <h2 class="fw-bold mb-2">
                    Data Alumni
                </h2>

                <p class="text-muted mb-0">
                    Kelola data alumni BLK Kabupaten Indramayu.
                </p>
            </div>

            <div>
                <a
                    href="{{ route('admin.alumni.create') }}"
                    class="btn btn-primary px-4 py-2"
                >
                    <i class="bi bi-plus-lg me-1"></i>
                    Tambah Alumni
                </a>
            </div>

        </div>

    </div>

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>
        </div>
    @endif

    {{-- ALERT ERROR --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            {{ session('error') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>
        </div>
    @endif

    {{-- STATISTIK --}}
    <div class="row g-4 mb-4">

        <div class="col-md-6 col-xl-3">

            <div class="card stat-card shadow-sm h-100">
                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <small class="text-muted">
                                Total Alumni
                            </small>

                            <h3 class="fw-bold mb-0 mt-1">
                                {{ $alumnis->total() }}
                            </h3>
                        </div>

                        <div class="icon-box bg-primary bg-opacity-10 text-primary">
                            <i class="bi bi-people-fill"></i>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>

    {{-- DATA ALUMNI --}}
    @if($alumnis->count() > 0)

        <div class="row g-4">

            @foreach($alumnis as $alumni)

                <div class="col-md-6 col-lg-4 col-xl-3">

                    <div class="card alumni-card shadow-sm">

                        {{-- GAMBAR --}}
                        @if($alumni->gambar)

                            <img
                                src="{{ asset('assets/image/alumni/' . $alumni->gambar) }}"
                                alt="{{ $alumni->judul }}"
                                class="alumni-image"
                            >

                        @else

                            <div class="image-placeholder">
                                <i class="bi bi-person-bounding-box"></i>
                            </div>

                        @endif

                        <div class="card-body p-4">

                            <h5 class="fw-bold mb-2">
                                {{ $alumni->judul }}
                            </h5>

                            <div class="description mb-3">
                                {{ $alumni->deskripsi ?: 'Tidak ada deskripsi.' }}
                            </div>

                            <div class="d-flex gap-2">

                                {{-- EDIT --}}
                                <a
                                    href="{{ route('admin.alumni.edit', $alumni->id) }}"
                                    class="btn btn-warning btn-action flex-fill"
                                >
                                    <i class="bi bi-pencil-square me-1"></i>
                                    Edit
                                </a>

                                {{-- HAPUS --}}
                                <form
                                    action="{{ route('admin.alumni.destroy', $alumni->id) }}"
                                    method="POST"
                                    class="flex-fill"
                                    onsubmit="return confirm('Yakin ingin menghapus data alumni ini?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-action w-100"
                                    >
                                        <i class="bi bi-trash me-1"></i>
                                        Hapus
                                    </button>
                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

        {{-- PAGINATION --}}
        @if($alumnis->hasPages())

            <div class="d-flex justify-content-center mt-5">
                {{ $alumnis->links() }}
            </div>

        @endif

    @else

        {{-- EMPTY STATE --}}
        <div class="empty-state shadow-sm text-center">

            <div class="mb-4">
                <i
                    class="bi bi-people"
                    style="font-size: 70px; color: #adb5bd;"
                ></i>
            </div>

            <h4 class="fw-bold">
                Belum Ada Data Alumni
            </h4>

            <p class="text-muted mb-4">
                Belum ada data alumni yang ditambahkan.
                Silakan tambahkan data alumni pertama.
            </p>

            <a
                href="{{ route('admin.alumni.create') }}"
                class="btn btn-primary px-4"
            >
                <i class="bi bi-plus-lg me-1"></i>
                Tambah Alumni
            </a>

        </div>

    @endif

</div>

@endsection
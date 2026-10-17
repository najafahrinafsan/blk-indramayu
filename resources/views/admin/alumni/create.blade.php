@extends('layouts.app')

@section('title', 'Tambah Alumni')

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

    .form-card {
        border: none;
        border-radius: 20px;
    }

    .form-label {
        font-weight: 600;
        color: #344054;
    }

    .form-control {
        border-radius: 12px;
        padding: 12px 14px;
        border-color: #dce3eb;
    }

    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 .2rem rgba(13, 110, 253, .10);
    }

    textarea.form-control {
        min-height: 180px;
        resize: vertical;
    }

    .upload-area {
        border: 2px dashed #dce3eb;
        border-radius: 16px;
        padding: 30px;
        text-align: center;
        background: #fafcff;
        transition: .3s;
        cursor: pointer;
    }

    .upload-area:hover {
        border-color: #0d6efd;
        background: #f5f9ff;
    }

    .upload-icon {
        width: 64px;
        height: 64px;
        margin: 0 auto 15px;
        border-radius: 18px;
        background: rgba(13, 110, 253, .1);
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }

    .preview-wrapper {
        display: none;
        margin-top: 20px;
    }

    .preview-image {
        width: 100%;
        max-height: 300px;
        object-fit: cover;
        border-radius: 15px;
        border: 1px solid #e5e7eb;
    }

    .btn-action {
        border-radius: 11px;
        padding: 11px 20px;
    }

    .required {
        color: #dc3545;
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

<div class="container py-4">

    {{-- HEADER --}}
    <div class="page-header shadow-sm p-4 mb-4">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">

            <div>
                <div class="text-primary fw-semibold mb-1">
                    <i class="bi bi-people-fill me-1"></i>
                    MANAJEMEN ALUMNI
                </div>

                <h2 class="fw-bold mb-2">
                    Tambah Alumni
                </h2>

                <p class="text-muted mb-0">
                    Tambahkan data alumni baru ke dalam website.
                </p>
            </div>

            <a
                href="{{ route('admin.alumni.index') }}"
                class="btn btn-outline-secondary btn-action"
            >
                <i class="bi bi-arrow-left me-1"></i>
                Kembali
            </a>

        </div>

    </div>

    {{-- VALIDATION ERROR --}}
    @if($errors->any())

        <div class="alert alert-danger alert-dismissible fade show shadow-sm border-0">

            <div class="fw-bold mb-2">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                Data belum dapat disimpan.
            </div>

            <ul class="mb-0 ps-4">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif

    {{-- FORM --}}
    <div class="card form-card shadow-sm">

        <div class="card-body p-4 p-md-5">

            <form
                action="{{ route('admin.alumni.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                <div class="row g-4">

                    {{-- GAMBAR --}}
                    <div class="col-lg-5">

                        <label class="form-label">
                            Foto / Gambar Alumni
                        </label>

                        <div
                            class="upload-area"
                            onclick="document.getElementById('gambar').click()"
                        >

                            <div class="upload-icon">
                                <i class="bi bi-cloud-arrow-up"></i>
                            </div>

                            <h6 class="fw-bold mb-2">
                                Pilih Gambar
                            </h6>

                            <p class="text-muted small mb-2">
                                Klik untuk memilih gambar alumni.
                            </p>

                            <small class="text-muted">
                                JPG, JPEG, PNG, WEBP · Maksimal 2 MB
                            </small>

                            <input
                                type="file"
                                name="gambar"
                                id="gambar"
                                class="d-none"
                                accept=".jpg,.jpeg,.png,.webp"
                            >

                        </div>

                        {{-- PREVIEW --}}
                        <div
                            id="previewWrapper"
                            class="preview-wrapper"
                        >

                            <div class="d-flex justify-content-between align-items-center mb-2">

                                <span class="fw-semibold">
                                    Preview Gambar
                                </span>

                                <button
                                    type="button"
                                    class="btn btn-sm btn-outline-danger"
                                    onclick="hapusPreview()"
                                >
                                    <i class="bi bi-x-lg me-1"></i>
                                    Hapus
                                </button>

                            </div>

                            <img
                                id="previewImage"
                                src="#"
                                alt="Preview gambar"
                                class="preview-image"
                            >

                        </div>

                    </div>

                    {{-- DATA --}}
                    <div class="col-lg-7">

                        {{-- JUDUL --}}
                        <div class="mb-4">

                            <label
                                for="judul"
                                class="form-label"
                            >
                                Judul Alumni
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="judul"
                                id="judul"
                                class="form-control @error('judul') is-invalid @enderror"
                                value="{{ old('judul') }}"
                                placeholder="Contoh: Alumni Pelatihan Las"
                                required
                            >

                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        {{-- DESKRIPSI --}}
                        <div class="mb-4">

                            <label
                                for="deskripsi"
                                class="form-label"
                            >
                                Deskripsi
                            </label>

                            <textarea
                                name="deskripsi"
                                id="deskripsi"
                                class="form-control @error('deskripsi') is-invalid @enderror"
                                placeholder="Tuliskan informasi atau deskripsi tentang alumni..."
                            >{{ old('deskripsi') }}</textarea>

                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>

                <hr class="my-4">

                {{-- BUTTON --}}
                <div class="d-flex flex-column flex-sm-row justify-content-end gap-2">

                    <a
                        href="{{ route('admin.alumni.index') }}"
                        class="btn btn-outline-secondary btn-action"
                    >
                        <i class="bi bi-x-lg me-1"></i>
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary btn-action"
                    >
                        <i class="bi bi-check-lg me-1"></i>
                        Simpan Alumni
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>
    const inputGambar = document.getElementById('gambar');
    const previewWrapper = document.getElementById('previewWrapper');
    const previewImage = document.getElementById('previewImage');

    inputGambar.addEventListener('change', function(event) {

        const file = event.target.files[0];

        if (!file) {
            return;
        }

        const allowedTypes = [
            'image/jpeg',
            'image/png',
            'image/webp'
        ];

        if (!allowedTypes.includes(file.type)) {
            alert('Format gambar harus JPG, JPEG, PNG, atau WEBP.');

            inputGambar.value = '';
            previewWrapper.style.display = 'none';

            return;
        }

        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran gambar maksimal 2 MB.');

            inputGambar.value = '';
            previewWrapper.style.display = 'none';

            return;
        }

        const reader = new FileReader();

        reader.onload = function(e) {

            previewImage.src = e.target.result;

            previewWrapper.style.display = 'block';

        };

        reader.readAsDataURL(file);
    });

    function hapusPreview() {

        inputGambar.value = '';

        previewImage.src = '#';

        previewWrapper.style.display = 'none';
    }
</script>

@endsection
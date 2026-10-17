@extends('layouts.app')

@section('title', 'Galeri Kegiatan')

@section('content')

<style>
    .gallery-page {
        padding-bottom: 30px;
    }

    /* =========================
       HEADER
    ========================== */
    .gallery-header {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #0d6efd, #0a58ca);
        border-radius: 18px;
        padding: 28px 30px;
        margin-bottom: 24px;
        color: #fff;
        box-shadow: 0 8px 25px rgba(13, 110, 253, 0.15);
    }

    .gallery-header::before {
        content: "";
        position: absolute;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
        right: -50px;
        top: -70px;
    }

    .gallery-header::after {
        content: "";
        position: absolute;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
        right: 100px;
        bottom: -60px;
    }

    .gallery-header-content {
        position: relative;
        z-index: 2;
    }

    .gallery-header h2 {
        font-size: 26px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .gallery-header p {
        margin: 0;
        color: rgba(255, 255, 255, 0.85);
        font-size: 14px;
    }

    .gallery-header-actions {
        position: relative;
        z-index: 2;
        display: flex;
        gap: 10px;
    }

    .btn-back-gallery {
        background: rgba(255, 255, 255, 0.12);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: #fff;
    }

    .btn-back-gallery:hover {
        background: #fff;
        color: #0d6efd;
    }

    .btn-add-gallery {
        background: #fff;
        color: #0d6efd;
        border: none;
        font-weight: 600;
    }

    .btn-add-gallery:hover {
        background: #f1f5ff;
        color: #0a58ca;
    }

    /* =========================
       INFO BAR
    ========================== */
    .gallery-info {
        display: flex;
        align-items: center;
        gap: 14px;
        background: #fff;
        border: 1px solid #edf0f4;
        border-radius: 14px;
        padding: 15px 18px;
        margin-bottom: 24px;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
    }

    .gallery-info-icon {
        width: 44px;
        height: 44px;
        min-width: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eaf2ff;
        color: #0d6efd;
        border-radius: 12px;
        font-size: 20px;
    }

    .gallery-info-title {
        font-weight: 600;
        color: #212529;
        font-size: 14px;
        margin-bottom: 2px;
    }

    .gallery-info-text {
        color: #6c757d;
        font-size: 13px;
    }

    /* =========================
       GALLERY CARD
    ========================== */
    .gallery-item {
        height: 100%;
        background: #fff;
        border: 1px solid #edf0f4;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.05);
        transition: all 0.25s ease;
    }

    .gallery-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.10);
    }

    /* =========================
       IMAGE
    ========================== */
    .gallery-image-wrapper {
        position: relative;
        height: 220px;
        overflow: hidden;
        background: #f1f3f5;
    }

    .gallery-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .gallery-item:hover .gallery-image {
        transform: scale(1.06);
    }

    .gallery-image-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to bottom,
            rgba(0, 0, 0, 0.05),
            transparent 45%,
            rgba(0, 0, 0, 0.25)
        );
        pointer-events: none;
    }

    .gallery-date {
        position: absolute;
        top: 12px;
        left: 12px;
        background: rgba(255, 255, 255, 0.93);
        color: #495057;
        padding: 6px 10px;
        border-radius: 8px;
        font-size: 11px;
        font-weight: 600;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
    }

    /* =========================
       CARD CONTENT
    ========================== */
    .gallery-content {
        padding: 17px;
    }

    .gallery-title {
        font-size: 16px;
        font-weight: 700;
        color: #212529;
        line-height: 1.4;
        margin-bottom: 8px;

        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .gallery-description {
        color: #6c757d;
        font-size: 13px;
        line-height: 1.6;
        min-height: 42px;
        margin-bottom: 15px;

        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .gallery-description.empty {
        font-style: italic;
        color: #adb5bd;
    }

    /* =========================
       ACTION BUTTON
    ========================== */
    .gallery-actions {
        display: flex;
        gap: 8px;
        padding-top: 14px;
        border-top: 1px solid #f0f1f3;
    }

    .gallery-actions .btn {
        flex: 1;
        font-size: 12px;
        font-weight: 600;
        border-radius: 8px;
        padding: 7px 10px;
    }

    .btn-edit-gallery {
        color: #0d6efd;
        border-color: #cfe2ff;
        background: #f8fbff;
    }

    .btn-edit-gallery:hover {
        background: #0d6efd;
        color: #fff;
    }

    .btn-delete-gallery {
        color: #dc3545;
        border-color: #f1b0b7;
        background: #fff8f8;
    }

    .btn-delete-gallery:hover {
        background: #dc3545;
        color: #fff;
    }

    /* =========================
       EMPTY STATE
    ========================== */
    .empty-gallery {
        background: #fff;
        border: 1px dashed #ced4da;
        border-radius: 16px;
        padding: 65px 20px;
        text-align: center;
    }

    .empty-gallery-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
        border-radius: 50%;
        background: #eef5ff;
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 34px;
    }

    .empty-gallery h5 {
        font-weight: 700;
        color: #212529;
        margin-bottom: 8px;
    }

    .empty-gallery p {
        max-width: 430px;
        margin: 0 auto 22px;
        color: #6c757d;
        font-size: 14px;
    }

    /* =========================
       PAGINATION
    ========================== */
    .gallery-pagination {
        margin-top: 28px;
        display: flex;
        justify-content: center;
    }

    /* =========================
       RESPONSIVE
    ========================== */
    @media (max-width: 768px) {

        .gallery-header {
            padding: 22px;
        }

        .gallery-header h2 {
            font-size: 22px;
        }

        .gallery-header-actions {
            width: 100%;
            margin-top: 18px;
        }

        .gallery-header-actions .btn {
            flex: 1;
        }

        .gallery-image-wrapper {
            height: 210px;
        }
    }

    @media (max-width: 480px) {

        .gallery-header-actions {
            flex-direction: column;
        }

        .gallery-header-actions .btn {
            width: 100%;
        }

        .gallery-info {
            align-items: flex-start;
        }
    }
</style>


<div class="container-fluid gallery-page">

    {{-- =========================================================
         HEADER
    ========================================================== --}}
    <div class="gallery-header">

        <div class="gallery-header-content">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

                <div>
                    <h2>
                        <i class="bi bi-images me-2"></i>
                        Galeri Kegiatan
                    </h2>

                    <p>
                        Kelola dokumentasi kegiatan BLK Kabupaten Indramayu.
                    </p>
                </div>

                <div class="gallery-header-actions">

                    {{-- Kembali --}}
                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="btn btn-back-gallery"
                    >
                        <i class="bi bi-arrow-left me-2"></i>
                        Kembali
                    </a>

                    {{-- Tambah --}}
                    <a
                        href="{{ route('admin.galeri.create') }}"
                        class="btn btn-add-gallery"
                    >
                        <i class="bi bi-plus-lg me-2"></i>
                        Tambah Galeri
                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         NOTIFIKASI
    ========================================================== --}}
    @if(session('success'))

        <div
            class="alert alert-success alert-dismissible fade show shadow-sm"
            role="alert"
        >

            <i class="bi bi-check-circle-fill me-2"></i>

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>

        </div>

    @endif


    {{-- =========================================================
         INFO
    ========================================================== --}}
    <div class="gallery-info">

        <div class="gallery-info-icon">
            <i class="bi bi-camera"></i>
        </div>

        <div>

            <div class="gallery-info-title">
                Dokumentasi Kegiatan
            </div>

            <div class="gallery-info-text">
                Foto kegiatan yang telah ditambahkan oleh administrator.
            </div>

        </div>

    </div>


    {{-- =========================================================
         DATA GALERI
    ========================================================== --}}
    @if($galeris->count() > 0)

        <div class="row g-4">

            @foreach($galeris as $galeri)

                <div class="col-xl-3 col-lg-4 col-md-6">

                    <div class="gallery-item">

                        {{-- FOTO --}}
                        <div class="gallery-image-wrapper">

                            @if($galeri->gambar)

                                <img
                                    src="{{ asset('assets/image/galeri/' . $galeri->gambar) }}"
                                    alt="{{ $galeri->judul }}"
                                    class="gallery-image"
                                >

                                <div class="gallery-image-overlay"></div>

                            @else

                                <div class="w-100 h-100 d-flex align-items-center justify-content-center">

                                    <i
                                        class="bi bi-image text-secondary"
                                        style="font-size: 48px;"
                                    ></i>

                                </div>

                            @endif


                            {{-- TANGGAL --}}
                            <div class="gallery-date">

                                <i class="bi bi-calendar3 me-1"></i>

                                {{ $galeri->created_at->format('d M Y') }}

                            </div>

                        </div>


                        {{-- INFORMASI --}}
                        <div class="gallery-content">

                            <div class="gallery-title">
                                {{ $galeri->judul }}
                            </div>


                            @if($galeri->deskripsi)

                                <div class="gallery-description">

                                    {{ Str::limit(
                                        $galeri->deskripsi,
                                        100
                                    ) }}

                                </div>

                            @else

                                <div class="gallery-description empty">
                                    Tidak ada deskripsi.
                                </div>

                            @endif


                            {{-- ACTION --}}
                            <div class="gallery-actions">

                                <a
                                    href="{{ route('admin.galeri.edit', $galeri->id) }}"
                                    class="btn btn-edit-gallery"
                                >
                                    <i class="bi bi-pencil-square me-1"></i>
                                    Edit
                                </a>


                                <form
                                    action="{{ route('admin.galeri.destroy', $galeri->id) }}"
                                    method="POST"
                                    class="flex-fill"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus galeri ini?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-delete-gallery w-100"
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


        {{-- =========================================================
             PAGINATION
        ========================================================== --}}
        @if($galeris->hasPages())

            <div class="gallery-pagination">

                {{ $galeris->links() }}

            </div>

        @endif


    @else

        {{-- =========================================================
             DATA KOSONG
        ========================================================== --}}
        <div class="empty-gallery">

            <div class="empty-gallery-icon">

                <i class="bi bi-images"></i>

            </div>

            <h5>
                Belum Ada Galeri
            </h5>

            <p>
                Belum ada dokumentasi kegiatan yang ditambahkan.
                Silakan tambahkan foto kegiatan pertama.
            </p>

            <a
                href="{{ route('admin.galeri.create') }}"
                class="btn btn-primary"
            >
                <i class="bi bi-plus-circle me-2"></i>
                Tambah Galeri Pertama
            </a>

        </div>

    @endif

</div>

@endsection
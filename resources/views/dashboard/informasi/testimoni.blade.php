@extends('layouts.app')

@section('title', 'Testimoni Alumni')

@section('content')

@include('dashboard.navbar')

{{-- =========================================================
     HEADER
========================================================= --}}
<section class="bg-primary text-white py-5">
    <div class="container text-center">

        <span class="badge bg-warning text-dark px-3 py-2 mb-3">
            TESTIMONI ALUMNI
        </span>

        <h1 class="fw-bold mb-3">
            Testimoni Alumni
        </h1>

        <p class="lead mb-0">
            Cerita dan pengalaman alumni setelah mengikuti pelatihan
            di Balai Latihan Kerja Kabupaten Indramayu.
        </p>

    </div>
</section>


{{-- =========================================================
     DAFTAR ALUMNI
========================================================= --}}
<section class="py-5">

    <div class="container">

        {{-- Judul --}}
        <div class="text-center mb-5">

            <span class="badge bg-primary px-3 py-2 mb-3">
                CERITA ALUMNI
            </span>

            <h2 class="fw-bold text-primary">
                Cerita Sukses Alumni
            </h2>

            <p class="text-muted mx-auto"
               style="max-width: 750px;">

                Pengalaman alumni menjadi bagian penting dari perjalanan
                pelatihan di BLK Kabupaten Indramayu. Berikut cerita dan
                pengalaman alumni setelah mengikuti program pelatihan.

            </p>

        </div>


        {{-- =====================================================
             DATA DARI DATABASE
        ====================================================== --}}
        <div class="row g-4">

            @forelse($alumnis as $alumni)

                <div class="col-md-6 col-lg-4">

                    <div class="card border-0 shadow h-100 testimonial-card">

                        {{-- Gambar Alumni --}}
                        @if($alumni->gambar)

                            <img
                                src="{{ asset('assets/image/alumni/' . $alumni->gambar) }}"
                                class="card-img-top testimonial-image"
                                alt="{{ $alumni->judul }}"
                            >

                        @else

                            <div class="no-image">

                                <i class="bi bi-person-circle display-3"></i>

                                <p class="mb-0 mt-2">
                                    Alumni BLK
                                </p>

                            </div>

                        @endif


                        {{-- Isi Card --}}
                        <div class="card-body p-4">

                            {{-- Icon Quote --}}
                            <div class="mb-3">
                                <i class="bi bi-quote display-5 text-primary"></i>
                            </div>


                            {{-- Deskripsi --}}
                            @if($alumni->deskripsi)

                                <p class="text-muted testimonial-description">
                                    "{{ $alumni->deskripsi }}"
                                </p>

                            @else

                                <p class="text-muted testimonial-description">
                                    Belum ada deskripsi alumni.
                                </p>

                            @endif


                            <hr>


                            {{-- Judul --}}
                            <h5 class="fw-bold mb-1">
                                {{ $alumni->judul }}
                            </h5>

                            <small class="text-primary fw-semibold">
                                Alumni BLK Kabupaten Indramayu
                            </small>

                        </div>

                    </div>

                </div>

            @empty

                {{-- Jika belum ada data --}}
                <div class="col-12">

                    <div class="empty-state text-center py-5">

                        <div class="empty-icon mb-4">

                            <i class="bi bi-people"></i>

                        </div>

                        <h4 class="fw-bold text-primary">
                            Belum Ada Data Alumni
                        </h4>

                        <p class="text-muted mb-0">
                            Data alumni akan tampil di halaman ini
                            setelah ditambahkan oleh admin.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>


        {{-- =====================================================
             PAGINATION
        ====================================================== --}}
        @if($alumnis->hasPages())

            <div class="d-flex justify-content-center mt-5">

                {{ $alumnis->links() }}

            </div>

        @endif

    </div>

</section>


{{-- =========================================================
     CTA
========================================================= --}}
<section class="py-5 bg-light">

    <div class="container text-center">

        <h3 class="fw-bold text-primary mb-3">
            Wujudkan Langkah Anda Bersama BLK
        </h3>

        <p class="text-muted mb-4">

            Tingkatkan keterampilan, bangun kompetensi,
            dan persiapkan diri untuk meraih peluang kerja
            maupun berwirausaha.

        </p>

        <a
            href="{{ route('kategori') }}"
            class="btn btn-warning fw-bold px-4 py-2"
        >

            Lihat Program Pelatihan

            <i class="bi bi-arrow-right ms-2"></i>

        </a>

    </div>

</section>


{{-- =========================================================
     STYLE
========================================================= --}}
<style>

    .testimonial-card {
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .testimonial-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.12) !important;
    }

    .testimonial-image {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .testimonial-card:hover .testimonial-image {
        transform: scale(1.04);
    }

    .testimonial-description {
        line-height: 1.8;
        min-height: 100px;
    }

    .no-image {
        height: 250px;
        background: #f8f9fa;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #6c757d;
    }

    .empty-state {
        padding: 60px 20px;
    }

    .empty-icon {
        width: 100px;
        height: 100px;
        margin: 0 auto;
        border-radius: 50%;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .empty-icon i {
        font-size: 45px;
        color: #0d6efd;
    }

</style>


@include('dashboard.footer')

@endsection
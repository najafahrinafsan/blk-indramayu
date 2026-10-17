@extends('layouts.app')

@section('title', 'Pendaftaran Berhasil')

@section('content')

@include('dashboard.navbar')

<section class="bg-primary text-white py-5">
    <div class="container text-center">
        <h1 class="fw-bold mb-2">
            Pendaftaran Berhasil
        </h1>

        <p class="lead mb-0">
            Terima kasih telah melakukan pendaftaran pelatihan.
        </p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="card border-0 shadow">
                    <div class="card-body p-4 p-lg-5 text-center">

                        <div class="mb-4">
                            <i
                                class="bi bi-check-circle-fill text-success"
                                style="font-size: 80px;"
                            ></i>
                        </div>

                        <h2 class="fw-bold text-success mb-3">
                            Pendaftaran Anda Berhasil!
                        </h2>

                        <p class="text-muted fs-5 mb-4">
                            {{ session('success') ??
                                'Pendaftaran Anda telah berhasil dikirim dan data Anda sudah kami terima.' }}
                        </p>

                        <div class="alert alert-primary text-start">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-info-circle-fill fs-4 me-3"></i>

                                <div>
                                    <strong class="d-block mb-1">
                                        Informasi Selanjutnya
                                    </strong>

                                    <span>
                                        Silakan menunggu informasi dari
                                        Balai Latihan Kerja Kabupaten
                                        Indramayu mengenai proses
                                        pendaftaran Anda.
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center gap-2 mt-4 flex-wrap">

                            <a
                                href="{{ route('pelatihan') }}"
                                class="btn btn-primary"
                            >
                                <i class="bi bi-book me-2"></i>
                                Lihat Pelatihan
                            </a>

                            <a
                                href="{{ url('/') }}"
                                class="btn btn-outline-secondary"
                            >
                                <i class="bi bi-house me-2"></i>
                                Kembali ke Beranda
                            </a>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@include('dashboard.footer')

@endsection
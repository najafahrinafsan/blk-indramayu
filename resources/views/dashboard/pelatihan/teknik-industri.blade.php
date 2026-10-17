@extends('layouts.app')

@section('title', 'Teknik & Industri')

@section('content')

@include('dashboard.navbar')


<!-- ==========================================
     HEADER DETAIL
========================================== -->

<section class="bg-primary text-white py-5">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-7">

                <span class="badge bg-light text-primary mb-3 px-3 py-2">
                    PROGRAM PELATIHAN
                </span>

                <h1 class="fw-bold mb-3">
                    Teknik & Industri
                </h1>

                <p class="lead mb-0">

                    Program pelatihan untuk meningkatkan keterampilan
                    teknis dan kompetensi kerja di bidang industri.

                </p>

            </div>

            <div class="col-lg-5 text-center mt-4 mt-lg-0">

                <img src="{{ asset('assets/image/pelatihan/teknik-industri.jpeg') }}"
                     class="img-fluid rounded-4 shadow"
                     alt="Pelatihan Teknik dan Industri"
                     style="max-height: 300px; object-fit: cover;">

            </div>

        </div>

    </div>

</section>


<!-- ==========================================
     DESKRIPSI PROGRAM
========================================== -->

<section class="py-5">

    <div class="container">

        <div class="row">

            <div class="col-lg-8">

                <h2 class="fw-bold text-primary mb-4">
                    Tentang Program
                </h2>

                <p class="text-muted"
                   style="line-height: 1.8;">

                    Program Teknik & Industri merupakan program pelatihan
                    yang dirancang untuk membekali peserta dengan
                    keterampilan teknis yang dibutuhkan dalam dunia kerja
                    dan sektor industri.

                </p>

                <p class="text-muted"
                   style="line-height: 1.8;">

                    Peserta akan mendapatkan pembelajaran teori dan praktik
                    sehingga mampu memahami prosedur kerja, menggunakan
                    peralatan sesuai standar keselamatan, serta menerapkan
                    keterampilan yang diperoleh dalam lingkungan kerja.

                </p>

            </div>


            <!-- Informasi singkat -->

            <div class="col-lg-4">

                <div class="card border-0 shadow-sm">

                    <div class="card-body p-4">

                        <h5 class="fw-bold text-primary mb-3">

                            <i class="bi bi-info-circle-fill me-2"></i>

                            Informasi Program

                        </h5>

                        <hr>

                        <p class="mb-3">

                            <strong>Bidang</strong><br>

                            Teknik & Industri

                        </p>

                        <p class="mb-3">

                            <strong>Metode</strong><br>

                            Teori dan Praktik

                        </p>

                        <p class="mb-0">

                            <strong>Fokus</strong><br>

                            Keterampilan Industri

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ==========================================
     KEJURUAN
========================================== -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold text-primary">
                Kejuruan yang Tersedia
            </h2>

            <p class="text-muted">

                Pilihan kejuruan dalam program Teknik & Industri.

            </p>

        </div>


        <div class="row g-4">


            <!-- Fillet Welder -->

            <div class="col-md-6">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4">

                        <div class="d-flex align-items-center mb-3">

                            <div class="training-icon bg-primary text-white me-3">

                                <i class="bi bi-fire"></i>

                            </div>

                            <h4 class="fw-bold mb-0">

                                Fillet Welder

                            </h4>

                        </div>

                        <p class="text-muted">

                            Pelatihan pengelasan yang membekali peserta
                            dengan keterampilan melakukan pengelasan
                            sambungan fillet menggunakan proses FCAW
                            dan SMAW.

                        </p>

                        <h6 class="fw-bold">
                            Kompetensi:
                        </h6>

                        <ul class="text-muted">

                            <li>
                                FCAW 2F / PB
                            </li>

                            <li>
                                SMAW 3F / PB
                            </li>

                            <li>
                                Penerapan keselamatan kerja
                            </li>

                            <li>
                                Penggunaan peralatan pengelasan
                            </li>

                        </ul>

                    </div>

                </div>

            </div>


            <!-- Operator Forklift -->

            <div class="col-md-6">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4">

                        <div class="d-flex align-items-center mb-3">

                            <div class="training-icon bg-warning text-dark me-3">

                                <i class="bi bi-truck"></i>

                            </div>

                            <h4 class="fw-bold mb-0">

                                Operator Forklift

                            </h4>

                        </div>

                        <p class="text-muted">

                            Pelatihan untuk membekali peserta dengan
                            pengetahuan dan keterampilan dalam mengoperasikan
                            forklift secara aman dan sesuai prosedur kerja.

                        </p>

                        <h6 class="fw-bold">
                            Kompetensi:
                        </h6>

                        <ul class="text-muted">

                            <li>
                                Pengoperasian forklift
                            </li>

                            <li>
                                Pemeriksaan peralatan
                            </li>

                            <li>
                                Keselamatan dan kesehatan kerja
                            </li>

                            <li>
                                Prosedur pengangkutan barang
                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ==========================================
     PELUANG KERJA
========================================== -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold text-primary">
                Peluang Kerja
            </h2>

            <p class="text-muted">

                Kompetensi yang diperoleh dapat mendukung berbagai
                peluang kerja di sektor industri.

            </p>

        </div>


        <div class="row g-4">


            <div class="col-md-4">

                <div class="text-center p-4">

                    <i class="bi bi-building display-5 text-primary"></i>

                    <h5 class="fw-bold mt-3">
                        Industri Manufaktur
                    </h5>

                    <p class="text-muted">
                        Peluang kerja pada perusahaan manufaktur
                        dan sektor industri.
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="text-center p-4">

                    <i class="bi bi-wrench-adjustable-circle display-5 text-primary"></i>

                    <h5 class="fw-bold mt-3">
                        Bidang Teknik
                    </h5>

                    <p class="text-muted">
                        Mendukung pekerjaan yang membutuhkan
                        keterampilan teknis dan pengelasan.
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="text-center p-4">

                    <i class="bi bi-box-seam display-5 text-primary"></i>

                    <h5 class="fw-bold mt-3">
                        Pergudangan
                    </h5>

                    <p class="text-muted">
                        Peluang kerja sebagai operator pada
                        sektor pergudangan dan logistik.
                    </p>

                </div>

            </div>


        </div>

    </div>

</section>


<!-- ==========================================
     CTA PENDAFTARAN
========================================== -->

<section class="py-5 bg-primary text-white">

    <div class="container text-center">

        <i class="bi bi-mortarboard-fill display-4 mb-3"></i>

        <h2 class="fw-bold">
            Tertarik Mengikuti Pelatihan Ini?
        </h2>

        <p class="lead mx-auto"
           style="max-width: 700px;">

            Tingkatkan keterampilan dan kompetensi Anda melalui
            program pelatihan di Balai Latihan Kerja Kabupaten
            Indramayu.

        </p>


        <div class="mt-4">

            <a href="{{ url('/pendaftaran') }}"
               class="btn btn-warning btn-lg fw-bold me-2">

                <i class="bi bi-pencil-square me-2"></i>

                Daftar Pelatihan

            </a>


            <a href="{{ url('/kategori') }}"
               class="btn btn-outline-light btn-lg">

                <i class="bi bi-arrow-left me-2"></i>

                Kembali ke Kategori

            </a>


            <a
    href="{{ route('pendaftaran.index', [
        'pelatihan' => 'teknik-industri'
    ]) }}"
    class="btn btn-primary"
>
    <i class="bi bi-pencil-square me-1"></i>
    Daftar Sebagai Peserta
</a>




        </div>

    </div>

</section>


@include('dashboard.footer')

@endsection
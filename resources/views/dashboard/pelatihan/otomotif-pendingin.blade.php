@extends('layouts.app')

@section('title', 'Otomotif & Pendingin')

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
                    Otomotif & Pendingin
                </h1>

                <p class="lead mb-0">

                    Program pelatihan untuk meningkatkan keterampilan
                    di bidang perawatan sepeda motor dan sistem pendingin
                    rumah tangga.

                </p>

            </div>


            <div class="col-lg-5 text-center mt-4 mt-lg-0">

                <img src="{{ asset('assets/image/pelatihan/otomotif-pendingin.jpg') }}"
                     class="img-fluid rounded-4 shadow"
                     alt="Pelatihan Otomotif dan Pendingin"
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


            <!-- Deskripsi -->

            <div class="col-lg-8">

                <h2 class="fw-bold text-primary mb-4">

                    Tentang Program

                </h2>


                <p class="text-muted"
                   style="line-height: 1.8;">

                    Program Otomotif & Pendingin merupakan program
                    pelatihan yang dirancang untuk memberikan keterampilan
                    praktis kepada peserta dalam melakukan perawatan,
                    pemeriksaan, dan perbaikan pada kendaraan bermotor
                    maupun sistem pendingin rumah tangga.

                </p>


                <p class="text-muted"
                   style="line-height: 1.8;">

                    Peserta akan memperoleh pembelajaran teori dan praktik
                    sehingga mampu memahami prinsip kerja peralatan,
                    melakukan pemeriksaan kerusakan, serta menerapkan
                    prosedur keselamatan kerja sesuai bidang keahlian.

                </p>

            </div>


            <!-- Informasi Program -->

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

                            Otomotif & Pendingin

                        </p>


                        <p class="mb-3">

                            <strong>Metode</strong><br>

                            Teori dan Praktik

                        </p>


                        <p class="mb-0">

                            <strong>Fokus</strong><br>

                            Perawatan dan Perbaikan

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

                Pilihan kejuruan dalam program Otomotif & Pendingin.

            </p>

        </div>


        <div class="row g-4">


            <!-- ==================================
                 SERVICE SEPEDA MOTOR
            =================================== -->

            <div class="col-md-6">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4">

                        <div class="d-flex align-items-center mb-3">

                            <div class="training-icon bg-danger text-white me-3">

                                <i class="bi bi-bicycle"></i>

                            </div>

                            <h4 class="fw-bold mb-0">

                                Service Sepeda Motor
                                Sistem Injeksi

                            </h4>

                        </div>


                        <p class="text-muted">

                            Pelatihan yang membekali peserta dengan
                            keterampilan melakukan pemeriksaan,
                            perawatan, dan perbaikan sepeda motor
                            dengan sistem bahan bakar injeksi.

                        </p>


                        <h6 class="fw-bold">

                            Kompetensi:

                        </h6>


                        <ul class="text-muted">

                            <li>
                                Pemeriksaan sistem injeksi
                            </li>

                            <li>
                                Perawatan sepeda motor
                            </li>

                            <li>
                                Pemeriksaan komponen mesin
                            </li>

                            <li>
                                Diagnosis gangguan kendaraan
                            </li>

                            <li>
                                Penerapan keselamatan kerja
                            </li>

                        </ul>

                    </div>

                </div>

            </div>



            <!-- ==================================
                 PERAWAT AC
            =================================== -->

            <div class="col-md-6">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4">

                        <div class="d-flex align-items-center mb-3">

                            <div class="training-icon bg-info text-white me-3">

                                <i class="bi bi-snow"></i>

                            </div>

                            <h4 class="fw-bold mb-0">

                                Perawat AC Residential

                            </h4>

                        </div>


                        <p class="text-muted">

                            Pelatihan yang memberikan keterampilan
                            kepada peserta dalam melakukan pemasangan,
                            pemeriksaan, perawatan, dan perbaikan
                            AC rumah tangga.

                        </p>


                        <h6 class="fw-bold">

                            Kompetensi:

                        </h6>


                        <ul class="text-muted">

                            <li>
                                Pengenalan sistem AC residential
                            </li>

                            <li>
                                Pemeriksaan komponen AC
                            </li>

                            <li>
                                Perawatan dan pembersihan AC
                            </li>

                            <li>
                                Pemeriksaan sistem refrigerasi
                            </li>

                            <li>
                                Penerapan keselamatan kerja
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
                peluang kerja dan usaha di bidang otomotif maupun
                pendingin.

            </p>

        </div>


        <div class="row g-4">


            <!-- Bengkel -->

            <div class="col-md-4">

                <div class="text-center p-4">

                    <i class="bi bi-tools display-5 text-primary"></i>

                    <h5 class="fw-bold mt-3">

                        Bengkel Sepeda Motor

                    </h5>

                    <p class="text-muted">

                        Peluang bekerja pada bengkel sepeda motor
                        sebagai teknisi atau mekanik.

                    </p>

                </div>

            </div>


            <!-- Teknisi AC -->

            <div class="col-md-4">

                <div class="text-center p-4">

                    <i class="bi bi-snow2 display-5 text-primary"></i>

                    <h5 class="fw-bold mt-3">

                        Teknisi AC

                    </h5>

                    <p class="text-muted">

                        Peluang bekerja sebagai teknisi pemasangan,
                        perawatan, dan perbaikan AC.

                    </p>

                </div>

            </div>


            <!-- Usaha -->

            <div class="col-md-4">

                <div class="text-center p-4">

                    <i class="bi bi-shop display-5 text-primary"></i>

                    <h5 class="fw-bold mt-3">

                        Wirausaha

                    </h5>

                    <p class="text-muted">

                        Kompetensi dapat dikembangkan menjadi
                        usaha jasa servis kendaraan maupun AC.

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

            Tingkatkan keterampilan Anda melalui program
            Otomotif & Pendingin di Balai Latihan Kerja
            Kabupaten Indramayu.

        </p>


        <div class="mt-4">


            <!-- Daftar -->

            <a href="{{ url('/pendaftaran') }}"
               class="btn btn-warning btn-lg fw-bold me-2">

                <i class="bi bi-pencil-square me-2"></i>

                Daftar Pelatihan

            </a>


            <!-- Kembali -->

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
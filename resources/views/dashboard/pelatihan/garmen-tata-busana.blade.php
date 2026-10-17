@extends('layouts.app')

@section('title', 'Garmen & Tata Busana')

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
                    Garmen & Tata Busana
                </h1>

                <p class="lead mb-0">

                    Program pelatihan untuk meningkatkan keterampilan
                    menjahit dan pembuatan pakaian sesuai kebutuhan
                    dunia kerja dan industri garmen.

                </p>

            </div>


            <div class="col-lg-5 text-center mt-4 mt-lg-0">

                <img src="{{ asset('assets/image/pelatihan/garmen-busana.jpeg') }}"
                     class="img-fluid rounded-4 shadow"
                     alt="Pelatihan Garmen dan Tata Busana"
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

                    Program Garmen & Tata Busana merupakan pelatihan
                    yang dirancang untuk membekali peserta dengan
                    keterampilan dalam pembuatan pakaian, mulai dari
                    memahami desain, membuat pola, menggunakan mesin
                    jahit, hingga menghasilkan pakaian yang sesuai
                    dengan standar yang ditentukan.

                </p>


                <p class="text-muted"
                   style="line-height: 1.8;">

                    Pelatihan dilaksanakan melalui pembelajaran teori
                    dan praktik sehingga peserta dapat mengembangkan
                    keterampilan secara langsung serta memiliki
                    kesiapan untuk bekerja di industri garmen maupun
                    mengembangkan usaha secara mandiri.

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

                            Garmen & Tata Busana

                        </p>


                        <p class="mb-3">

                            <strong>Metode</strong><br>

                            Teori dan Praktik

                        </p>


                        <p class="mb-0">

                            <strong>Fokus</strong><br>

                            Menjahit dan Pembuatan Pakaian

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

                Pilihan kejuruan dalam program Garmen & Tata Busana.

            </p>

        </div>


        <div class="row g-4">


            <!-- ==================================
                 MENJAHIT PAKAIAN
            =================================== -->

            <div class="col-md-6">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4">

                        <div class="d-flex align-items-center mb-3">

                            <div class="training-icon bg-success text-white me-3">

                                <i class="bi bi-scissors"></i>

                            </div>

                            <h4 class="fw-bold mb-0">

                                Menjahit Pakaian
                                Sesuai Style

                            </h4>

                        </div>


                        <p class="text-muted">

                            Pelatihan yang membekali peserta dengan
                            keterampilan membuat pakaian berdasarkan
                            desain dan style yang telah ditentukan.

                        </p>


                        <h6 class="fw-bold">
                            Kompetensi:
                        </h6>


                        <ul class="text-muted">

                            <li>
                                Mengenal jenis bahan pakaian
                            </li>

                            <li>
                                Membaca dan memahami desain pakaian
                            </li>

                            <li>
                                Membuat pola pakaian
                            </li>

                            <li>
                                Menggunakan mesin jahit
                            </li>

                            <li>
                                Menjahit pakaian sesuai style
                            </li>

                            <li>
                                Melakukan finishing pakaian
                            </li>

                        </ul>

                    </div>

                </div>

            </div>



            <!-- ==================================
                 ASISTEN PEMBUAT PAKAIAN
            =================================== -->

            <div class="col-md-6">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4">

                        <div class="d-flex align-items-center mb-3">

                            <div class="training-icon bg-primary text-white me-3">

                                <i class="bi bi-person-workspace"></i>

                            </div>

                            <h4 class="fw-bold mb-0">

                                Asisten Pembuat
                                Pakaian

                            </h4>

                        </div>


                        <p class="text-muted">

                            Pelatihan yang memberikan keterampilan dasar
                            untuk membantu proses pembuatan pakaian,
                            mulai dari persiapan bahan hingga proses
                            penyelesaian pakaian.

                        </p>


                        <h6 class="fw-bold">
                            Kompetensi:
                        </h6>


                        <ul class="text-muted">

                            <li>
                                Persiapan bahan pakaian
                            </li>

                            <li>
                                Penggunaan alat jahit
                            </li>

                            <li>
                                Membantu proses pemotongan bahan
                            </li>

                            <li>
                                Membantu proses penjahitan
                            </li>

                            <li>
                                Pemeriksaan hasil jahitan
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

                Keterampilan yang diperoleh dapat dikembangkan
                untuk bekerja maupun berwirausaha di bidang
                garmen dan tata busana.

            </p>

        </div>


        <div class="row g-4">


            <!-- Industri Garmen -->

            <div class="col-md-4">

                <div class="text-center p-4">

                    <i class="bi bi-building display-5 text-primary"></i>

                    <h5 class="fw-bold mt-3">
                        Industri Garmen
                    </h5>

                    <p class="text-muted">

                        Peluang bekerja pada perusahaan garmen
                        dan industri pakaian.

                    </p>

                </div>

            </div>


            <!-- Penjahit -->

            <div class="col-md-4">

                <div class="text-center p-4">

                    <i class="bi bi-scissors display-5 text-primary"></i>

                    <h5 class="fw-bold mt-3">
                        Usaha Menjahit
                    </h5>

                    <p class="text-muted">

                        Keterampilan dapat dikembangkan menjadi
                        usaha jasa jahit dan pembuatan pakaian.

                    </p>

                </div>

            </div>


            <!-- Konveksi -->

            <div class="col-md-4">

                <div class="text-center p-4">

                    <i class="bi bi-shop display-5 text-primary"></i>

                    <h5 class="fw-bold mt-3">
                        Usaha Konveksi
                    </h5>

                    <p class="text-muted">

                        Membuka peluang untuk bekerja atau
                        mengembangkan usaha di bidang konveksi.

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

            Tingkatkan keterampilan menjahit dan tata busana
            melalui program pelatihan di Balai Latihan Kerja
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
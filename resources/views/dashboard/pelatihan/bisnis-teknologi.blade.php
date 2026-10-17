@extends('layouts.app')

@section('title', 'Bisnis & Teknologi')

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
                    Bisnis & Teknologi
                </h1>

                <p class="lead mb-0">
                    Program pelatihan untuk meningkatkan kemampuan
                    peserta dalam pemasaran digital, pengelolaan media
                    digital, dan penyusunan strategi pemasaran berbasis
                    teknologi.
                </p>

            </div>


            <div class="col-lg-5 text-center mt-4 mt-lg-0">

                <img src="{{ asset('assets/image/pelatihan/digital-marketing.jpg') }}"
                     class="img-fluid rounded-4 shadow"
                     alt="Pelatihan Digital Marketing"
                     style="max-height: 300px; object-fit: cover;">

            </div>

        </div>

    </div>

</section>

<a
    href="{{ route('pendaftaran.index', [
        'pelatihan' => 'teknik-industri'
    ]) }}"
    class="btn btn-primary"
>
    <i class="bi bi-pencil-square me-1"></i>
    Daftar Sebagai Peserta
</a>



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

                    Program Bisnis & Teknologi merupakan pelatihan yang
                    dirancang untuk membekali peserta dengan pengetahuan
                    dan keterampilan dalam memanfaatkan teknologi digital
                    sebagai sarana pemasaran dan pengembangan bisnis.

                </p>

                <p class="text-muted"
                   style="line-height: 1.8;">

                    Peserta akan mempelajari konsep pemasaran digital,
                    pengelolaan media sosial, pembuatan konten, strategi
                    promosi, serta pemanfaatan berbagai platform digital
                    untuk meningkatkan jangkauan dan daya saing usaha.

                </p>

                <p class="text-muted"
                   style="line-height: 1.8;">

                    Pelatihan dilaksanakan melalui pembelajaran teori dan
                    praktik sehingga peserta dapat menerapkan strategi
                    pemasaran digital secara langsung.

                </p>

            </div>


            <!-- INFORMASI PROGRAM -->

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

                            Bisnis & Teknologi

                        </p>

                        <p class="mb-3">

                            <strong>Program</strong><br>

                            Digital Marketing & Strategy Specialist

                        </p>

                        <p class="mb-0">

                            <strong>Metode</strong><br>

                            Teori dan Praktik

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
                Program yang Tersedia
            </h2>

            <p class="text-muted">
                Program pelatihan di bidang bisnis dan teknologi digital.
            </p>

        </div>


        <div class="row justify-content-center">

            <div class="col-md-10 col-lg-8">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4">


                        <div class="text-center mb-4">

                            <div class="training-icon bg-primary text-white mx-auto">

                                <i class="bi bi-megaphone-fill"></i>

                            </div>

                        </div>


                        <h4 class="fw-bold text-center mb-3">

                            Digital Marketing &
                            Strategy Specialist

                        </h4>


                        <p class="text-muted">

                            Program pelatihan yang membekali peserta
                            dengan kemampuan merancang dan menerapkan
                            strategi pemasaran melalui berbagai media
                            dan platform digital.

                        </p>


                        <h6 class="fw-bold">
                            Kompetensi:
                        </h6>


                        <ul class="text-muted">

                            <li>
                                Memahami konsep dasar digital marketing
                            </li>

                            <li>
                                Mengenal berbagai platform pemasaran digital
                            </li>

                            <li>
                                Menyusun strategi pemasaran digital
                            </li>

                            <li>
                                Mengelola media sosial untuk kebutuhan bisnis
                            </li>

                            <li>
                                Membuat konten pemasaran digital
                            </li>

                            <li>
                                Mengenal strategi promosi melalui media digital
                            </li>

                            <li>
                                Mengenal target pasar dan perilaku konsumen
                            </li>

                            <li>
                                Melakukan evaluasi hasil pemasaran digital
                            </li>

                        </ul>


                        <div class="alert alert-primary mt-4 mb-0">

                            <i class="bi bi-lightbulb-fill me-2"></i>

                            Peserta diarahkan untuk mampu memanfaatkan
                            teknologi digital sebagai bagian dari strategi
                            pemasaran dan pengembangan usaha.

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ==========================================
     KOMPETENSI UTAMA
========================================== -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold text-primary">
                Kompetensi Utama
            </h2>

            <p class="text-muted">
                Kemampuan yang dikembangkan selama mengikuti pelatihan.
            </p>

        </div>


        <div class="row g-4">


            <!-- Strategi -->

            <div class="col-md-4">

                <div class="text-center p-4">

                    <i class="bi bi-bar-chart-line-fill display-5 text-primary"></i>

                    <h5 class="fw-bold mt-3">
                        Strategi Digital
                    </h5>

                    <p class="text-muted">
                        Menyusun strategi pemasaran yang sesuai
                        dengan target dan kebutuhan bisnis.
                    </p>

                </div>

            </div>


            <!-- Media Sosial -->

            <div class="col-md-4">

                <div class="text-center p-4">

                    <i class="bi bi-share-fill display-5 text-primary"></i>

                    <h5 class="fw-bold mt-3">
                        Media Sosial
                    </h5>

                    <p class="text-muted">
                        Mengelola media sosial sebagai sarana
                        komunikasi dan pemasaran.
                    </p>

                </div>

            </div>


            <!-- Konten -->

            <div class="col-md-4">

                <div class="text-center p-4">

                    <i class="bi bi-camera-fill display-5 text-primary"></i>

                    <h5 class="fw-bold mt-3">
                        Konten Digital
                    </h5>

                    <p class="text-muted">
                        Mengembangkan konten yang menarik dan
                        relevan untuk kebutuhan pemasaran.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- ==========================================
     PELUANG KERJA
========================================== -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold text-primary">
                Peluang Kerja & Usaha
            </h2>

            <p class="text-muted">

                Kompetensi digital marketing dapat dimanfaatkan
                untuk berbagai kebutuhan pekerjaan dan usaha.

            </p>

        </div>


        <div class="row g-4">


            <!-- Digital Marketing -->

            <div class="col-md-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body text-center p-4">

                        <i class="bi bi-megaphone display-5 text-primary"></i>

                        <h5 class="fw-bold mt-3">
                            Digital Marketing
                        </h5>

                        <p class="text-muted">
                            Berkarier dalam bidang pemasaran digital
                            pada perusahaan maupun organisasi.
                        </p>

                    </div>

                </div>

            </div>


            <!-- Social Media -->

            <div class="col-md-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body text-center p-4">

                        <i class="bi bi-instagram display-5 text-primary"></i>

                        <h5 class="fw-bold mt-3">
                            Social Media Specialist
                        </h5>

                        <p class="text-muted">
                            Mengelola media sosial dan konten digital
                            untuk mendukung kegiatan pemasaran.
                        </p>

                    </div>

                </div>

            </div>


            <!-- Wirausaha -->

            <div class="col-md-4">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body text-center p-4">

                        <i class="bi bi-shop display-5 text-primary"></i>

                        <h5 class="fw-bold mt-3">
                            Wirausaha Digital
                        </h5>

                        <p class="text-muted">
                            Memanfaatkan pemasaran digital untuk
                            mengembangkan bisnis secara mandiri.
                        </p>

                    </div>

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

        <i class="bi bi-laptop display-4 mb-3"></i>

        <h2 class="fw-bold">
            Tertarik Mengikuti Pelatihan Ini?
        </h2>

        <p class="lead mx-auto"
           style="max-width: 750px;">

            Tingkatkan kemampuan pemasaran digital dan manfaatkan
            teknologi untuk mengembangkan karier maupun usaha Anda
            melalui program Bisnis & Teknologi.

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

        </div>

    </div>

</section>



@include('dashboard.footer')

@endsection

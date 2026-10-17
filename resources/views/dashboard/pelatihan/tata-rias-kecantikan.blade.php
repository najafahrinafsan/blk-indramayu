@extends('layouts.app')

@section('title', 'Tata Rias & Kecantikan')

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
                    Tata Rias & Kecantikan
                </h1>

                <p class="lead mb-0">

                    Program pelatihan untuk mengembangkan keterampilan
                    tata rias wajah serta meningkatkan kesiapan peserta
                    untuk bekerja maupun berwirausaha di bidang kecantikan.

                </p>

            </div>


            <div class="col-lg-5 text-center mt-4 mt-lg-0">

                <img src="{{ asset('assets/image/pelatihan/tata-rias.jpg') }}"
                     class="img-fluid rounded-4 shadow"
                     alt="Pelatihan Tata Rias dan Kecantikan"
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

                    Program Tata Rias & Kecantikan merupakan pelatihan
                    yang dirancang untuk membekali peserta dengan
                    pengetahuan dan keterampilan dasar dalam melakukan
                    tata rias wajah secara tepat, rapi, dan sesuai
                    dengan kebutuhan.

                </p>


                <p class="text-muted"
                   style="line-height: 1.8;">

                    Melalui pembelajaran teori dan praktik, peserta
                    diberikan kesempatan untuk mengembangkan kreativitas,
                    ketelitian, dan keterampilan dalam merias wajah
                    sehingga dapat menjadi bekal untuk memasuki dunia
                    kerja maupun mengembangkan usaha di bidang kecantikan.

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

                            Tata Rias & Kecantikan

                        </p>


                        <p class="mb-3">

                            <strong>Metode</strong><br>

                            Teori dan Praktik

                        </p>


                        <p class="mb-0">

                            <strong>Fokus</strong><br>

                            Tata Rias Wajah

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

                Pilihan kejuruan dalam program Tata Rias & Kecantikan.

            </p>

        </div>


        <div class="row justify-content-center">


            <!-- ==================================
                 MERIAS WAJAH
            =================================== -->

            <div class="col-md-8 col-lg-6">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4">

                        <div class="text-center mb-4">

                            <div class="training-icon bg-warning text-dark mx-auto">

                                <i class="bi bi-stars"></i>

                            </div>

                        </div>


                        <h4 class="fw-bold text-center mb-3">

                            Merias Wajah

                        </h4>


                        <p class="text-muted">

                            Pelatihan yang membekali peserta dengan
                            keterampilan melakukan tata rias wajah
                            sesuai dengan kebutuhan dan karakteristik
                            pengguna.

                        </p>


                        <h6 class="fw-bold">

                            Kompetensi:

                        </h6>


                        <ul class="text-muted">

                            <li>
                                Mengenal jenis dan karakteristik wajah
                            </li>

                            <li>
                                Mengenal alat dan bahan tata rias
                            </li>

                            <li>
                                Persiapan sebelum melakukan tata rias
                            </li>

                            <li>
                                Teknik dasar tata rias wajah
                            </li>

                            <li>
                                Pemilihan warna dan kosmetik
                            </li>

                            <li>
                                Penerapan tata rias sesuai kebutuhan
                            </li>

                            <li>
                                Menjaga kebersihan dan keamanan
                                alat serta bahan
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

                Keterampilan tata rias dapat dikembangkan menjadi
                berbagai peluang kerja maupun usaha.

            </p>

        </div>


        <div class="row g-4">


            <!-- Make Up Artist -->

            <div class="col-md-4">

                <div class="text-center p-4">

                    <i class="bi bi-person-hearts display-5 text-primary"></i>

                    <h5 class="fw-bold mt-3">

                        Make Up Artist

                    </h5>

                    <p class="text-muted">

                        Mengembangkan keterampilan sebagai perias
                        untuk berbagai kebutuhan dan acara.

                    </p>

                </div>

            </div>


            <!-- Salon -->

            <div class="col-md-4">

                <div class="text-center p-4">

                    <i class="bi bi-shop display-5 text-primary"></i>

                    <h5 class="fw-bold mt-3">

                        Salon Kecantikan

                    </h5>

                    <p class="text-muted">

                        Peluang bekerja di salon atau mengembangkan
                        usaha jasa kecantikan secara mandiri.

                    </p>

                </div>

            </div>


            <!-- Wirausaha -->

            <div class="col-md-4">

                <div class="text-center p-4">

                    <i class="bi bi-briefcase-fill display-5 text-primary"></i>

                    <h5 class="fw-bold mt-3">

                        Wirausaha

                    </h5>

                    <p class="text-muted">

                        Membuka jasa tata rias dan mengembangkan
                        usaha di bidang kecantikan.

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

            Tingkatkan keterampilan dan kreativitas Anda melalui
            program Tata Rias & Kecantikan di Balai Latihan Kerja
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
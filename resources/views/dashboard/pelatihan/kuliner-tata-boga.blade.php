@extends('layouts.app')

@section('title', 'Kuliner & Tata Boga')

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
                    Kuliner & Tata Boga
                </h1>

                <p class="lead mb-0">

                    Program pelatihan untuk mengembangkan keterampilan
                    pengolahan makanan, khususnya dalam pembuatan
                    roti dan kue.

                </p>

            </div>


            <div class="col-lg-5 text-center mt-4 mt-lg-0">

                <img src="{{ asset('assets/image/pelatihan/kuliner.jpg') }}"
                     class="img-fluid rounded-4 shadow"
                     alt="Pelatihan Kuliner dan Tata Boga"
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

                    Program Kuliner & Tata Boga merupakan pelatihan
                    yang dirancang untuk membekali peserta dengan
                    keterampilan dalam mengolah bahan makanan menjadi
                    produk kuliner yang berkualitas.

                </p>


                <p class="text-muted"
                   style="line-height: 1.8;">

                    Peserta akan memperoleh pembelajaran teori dan
                    praktik mengenai proses pembuatan roti dan kue,
                    mulai dari persiapan bahan, pengolahan adonan,
                    proses pemanggangan, hingga penyajian produk.

                </p>


                <p class="text-muted"
                   style="line-height: 1.8;">

                    Keterampilan yang diperoleh diharapkan dapat menjadi
                    bekal bagi peserta untuk bekerja di bidang kuliner
                    maupun mengembangkan usaha secara mandiri.

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

                            Kuliner & Tata Boga

                        </p>


                        <p class="mb-3">

                            <strong>Metode</strong><br>

                            Teori dan Praktik

                        </p>


                        <p class="mb-0">

                            <strong>Fokus</strong><br>

                            Pembuatan Roti dan Kue

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

                Pilihan kejuruan dalam program Kuliner & Tata Boga.

            </p>

        </div>


        <div class="row justify-content-center">


            <!-- ==================================
                 MEMBUAT ROTI DAN KUE
            =================================== -->

            <div class="col-md-8 col-lg-6">

                <div class="card border-0 shadow-sm h-100">

                    <div class="card-body p-4">


                        <div class="text-center mb-4">

                            <div class="training-icon bg-info text-white mx-auto">

                                <i class="bi bi-cup-hot-fill"></i>

                            </div>

                        </div>


                        <h4 class="fw-bold text-center mb-3">

                            Membuat Roti dan Kue

                        </h4>


                        <p class="text-muted">

                            Pelatihan yang membekali peserta dengan
                            keterampilan dalam membuat berbagai produk
                            roti dan kue melalui proses pengolahan bahan
                            yang tepat dan higienis.

                        </p>


                        <h6 class="fw-bold">

                            Kompetensi:

                        </h6>


                        <ul class="text-muted">

                            <li>
                                Mengenal bahan dasar pembuatan roti dan kue
                            </li>

                            <li>
                                Menyiapkan bahan dan peralatan
                            </li>

                            <li>
                                Menimbang dan mengolah bahan
                            </li>

                            <li>
                                Membuat dan mengolah adonan
                            </li>

                            <li>
                                Melakukan proses fermentasi
                            </li>

                            <li>
                                Melakukan proses pemanggangan
                            </li>

                            <li>
                                Melakukan finishing dan penyajian
                            </li>

                            <li>
                                Menjaga kebersihan dan sanitasi
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

                Keterampilan di bidang kuliner dapat dikembangkan
                menjadi berbagai peluang kerja maupun usaha.

            </p>

        </div>


        <div class="row g-4">


            <!-- Bakery -->

            <div class="col-md-4">

                <div class="text-center p-4">

                    <i class="bi bi-shop display-5 text-primary"></i>

                    <h5 class="fw-bold mt-3">

                        Bakery

                    </h5>

                    <p class="text-muted">

                        Peluang bekerja pada toko roti,
                        bakery, maupun usaha kue.

                    </p>

                </div>

            </div>


            <!-- Usaha Kuliner -->

            <div class="col-md-4">

                <div class="text-center p-4">

                    <i class="bi bi-basket2-fill display-5 text-primary"></i>

                    <h5 class="fw-bold mt-3">

                        Usaha Kuliner

                    </h5>

                    <p class="text-muted">

                        Mengembangkan usaha pembuatan roti,
                        kue, dan berbagai produk kuliner.

                    </p>

                </div>

            </div>


            <!-- Katering -->

            <div class="col-md-4">

                <div class="text-center p-4">

                    <i class="bi bi-box-seam display-5 text-primary"></i>

                    <h5 class="fw-bold mt-3">

                        Katering

                    </h5>

                    <p class="text-muted">

                        Keterampilan dapat dimanfaatkan untuk
                        mendukung usaha katering dan pesanan makanan.

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

            Kembangkan keterampilan kuliner dan raih peluang
            kerja maupun usaha melalui program Kuliner & Tata Boga
            di Balai Latihan Kerja Kabupaten Indramayu.

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
@extends('layouts.app')

@section('title', 'Tugas Pokok, Fungsi, Visi, Misi dan Kebijakan')

@section('content')

@include('dashboard.navbar')


<!-- ==========================================
     HEADER
========================================== -->

<section class="bg-primary text-white py-5">

    <div class="container text-center">

        <h1 class="fw-bold mb-3">
            Tugas Pokok dan Fungsi
        </h1>

        <p class="lead mb-0">
            Visi, misi, kebijakan, serta tugas dan fungsi
            Balai Latihan Kerja Kabupaten Indramayu.
        </p>

    </div>

</section>


<!-- ==========================================
     VISI
========================================== -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-primary px-3 py-2 mb-3">
                VISI
            </span>

            <h2 class="fw-bold text-primary">
                Visi BLK Kabupaten Indramayu
            </h2>

        </div>


        <div class="row justify-content-center">

            <div class="col-lg-9">

                <div class="card shadow border-0 visi-card">

                    <div class="card-body text-center p-4 p-lg-5">

                        <div class="visi-icon">

                            <i class="bi bi-eye-fill"></i>

                        </div>

                        <h4 class="fw-bold text-primary mb-3">
                            Visi
                        </h4>

                        <p class="fs-5 text-muted mb-0">

                            "Terwujudnya Balai Latihan Kerja (BLK) yang
                            Unggul, Maju, Mandiri, Profesional dan
                            berdaya saing."

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ==========================================
     MISI
========================================== -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-success px-3 py-2 mb-3">
                MISI
            </span>

            <h2 class="fw-bold text-primary">
                Misi BLK Kabupaten Indramayu
            </h2>

            <p class="text-muted">
                Langkah strategis untuk mewujudkan visi BLK.
            </p>

        </div>


        <div class="row g-4">


            <!-- Misi 1 -->

            <div class="col-md-6">

                <div class="card shadow-sm border-0 h-100 fungsi-card">

                    <div class="card-body p-4">

                        <div class="misi-number">
                            01
                        </div>

                        <h5 class="fw-bold mt-3">
                            Meningkatkan Kualitas Sumber Daya Aparatur
                        </h5>

                        <p class="text-muted mb-0">
                            Meningkatkan kualitas dan kemampuan sumber daya
                            aparatur dalam mendukung pelayanan BLK.
                        </p>

                    </div>

                </div>

            </div>


            <!-- Misi 2 -->

            <div class="col-md-6">

                <div class="card shadow-sm border-0 h-100 fungsi-card">

                    <div class="card-body p-4">

                        <div class="misi-number">
                            02
                        </div>

                        <h5 class="fw-bold mt-3">
                            Meningkatkan Kompetensi Tenaga Kerja
                        </h5>

                        <p class="text-muted mb-0">
                            Meningkatkan kompetensi tenaga kerja melalui
                            penyelenggaraan pelatihan yang sesuai dengan
                            kebutuhan dunia kerja.
                        </p>

                    </div>

                </div>

            </div>


            <!-- Misi 3 -->

            <div class="col-md-6">

                <div class="card shadow-sm border-0 h-100 fungsi-card">

                    <div class="card-body p-4">

                        <div class="misi-number">
                            03
                        </div>

                        <h5 class="fw-bold mt-3">
                            Meningkatkan Perluasan Kesempatan Kerja
                        </h5>

                        <p class="text-muted mb-0">
                            Mendorong peningkatan kesempatan kerja bagi
                            masyarakat melalui pengembangan kompetensi
                            dan keterampilan.
                        </p>

                    </div>

                </div>

            </div>


            <!-- Misi 4 -->

            <div class="col-md-6">

                <div class="card shadow-sm border-0 h-100 fungsi-card">

                    <div class="card-body p-4">

                        <div class="misi-number">
                            04
                        </div>

                        <h5 class="fw-bold mt-3">
                            Menjalin Hubungan Industrial yang Harmonis
                        </h5>

                        <p class="text-muted mb-0">
                            Membangun hubungan industrial yang harmonis
                            antara tenaga kerja, dunia usaha, dan pihak
                            terkait lainnya.
                        </p>

                    </div>

                </div>

            </div>


            <!-- Misi 5 -->

            <div class="col-md-6 mx-md-auto">

                <div class="card shadow-sm border-0 h-100 fungsi-card">

                    <div class="card-body p-4">

                        <div class="misi-number">
                            05
                        </div>

                        <h5 class="fw-bold mt-3">
                            Meningkatkan Sarana dan Prasarana Workshop
                        </h5>

                        <p class="text-muted mb-0">
                            Meningkatkan kualitas dan ketersediaan sarana
                            serta prasarana workshop untuk mendukung
                            kegiatan pelatihan.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ==========================================
     KEBIJAKAN
========================================== -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                KEBIJAKAN
            </span>

            <h2 class="fw-bold text-primary">
                Kebijakan BLK
            </h2>

            <p class="text-muted">
                Kebijakan yang menjadi landasan dalam mendukung
                penyelenggaraan pelayanan dan pelatihan kerja.
            </p>

        </div>


        <div class="row justify-content-center">

            <div class="col-lg-10">

                <div class="card shadow border-0">

                    <div class="card-body p-4 p-lg-5">


                        <!-- Kebijakan 1 -->

                        <div class="policy-item">

                            <span>01</span>

                            <p>
                                Memberikan kemudahan untuk mengikuti
                                pendidikan dan pelatihan aparatur.
                            </p>

                        </div>


                        <!-- Kebijakan 2 -->

                        <div class="policy-item">

                            <span>02</span>

                            <p>
                                Penyediaan sarana dan prasarana kerja.
                            </p>

                        </div>


                        <!-- Kebijakan 3 -->

                        <div class="policy-item">

                            <span>03</span>

                            <p>
                                Pelatihan mengacu pada trilogi pelatihan.
                            </p>

                        </div>


                        <!-- Kebijakan 4 -->

                        <div class="policy-item">

                            <span>04</span>

                            <p>
                                Kemudahan akses informasi pasar kerja.
                            </p>

                        </div>


                        <!-- Kebijakan 5 -->

                        <div class="policy-item">

                            <span>05</span>

                            <p>
                                Penempatan tenaga kerja melalui usaha mandiri.
                            </p>

                        </div>


                        <!-- Kebijakan 6 -->

                        <div class="policy-item">

                            <span>06</span>

                            <p>
                                Penegakan peraturan perundang-undangan
                                tentang ketenagakerjaan.
                            </p>

                        </div>


                        <!-- Kebijakan 7 -->

                        <div class="policy-item mb-0">

                            <span>07</span>

                            <p>
                                Meningkatkan pembinaan dan sosialisasi
                                perundang-undangan ketenagakerjaan.
                            </p>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ==========================================
     TUGAS POKOK
========================================== -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-primary px-3 py-2 mb-3">
                TUGAS POKOK
            </span>

            <h2 class="fw-bold text-primary">
                Tugas Pokok BLK
            </h2>

            <p class="text-muted">
                Dasar pelaksanaan tugas Balai Latihan Kerja
                Kabupaten Indramayu.
            </p>

        </div>


        <div class="row justify-content-center">

            <div class="col-lg-10">

                <div class="card shadow border-0">

                    <div class="card-body p-4 p-lg-5">

                        <div class="d-flex align-items-start">

                            <div class="tugas-icon bg-primary text-white me-4">

                                <i class="bi bi-building"></i>

                            </div>

                            <div>

                                <h4 class="fw-bold mb-3">
                                    Tugas Pokok
                                </h4>

                                <p class="text-muted mb-0"
                                   style="text-align: justify; line-height: 1.9;">

                                    Berdasarkan Peraturan Bupati Indramayu
                                    Nomor 18 Tahun 2009, UPTD Balai Latihan
                                    Kerja (BLK / LLK) mempunyai tugas pokok
                                    melaksanakan sebagian tugas Dinas di
                                    bidang pelatihan tenaga kerja sektor
                                    industri, pertanian, aneka kejuruan,
                                    perdagangan dan pariwisata.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ==========================================
     FUNGSI
========================================== -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <span class="badge bg-success px-3 py-2 mb-3">
                FUNGSI
            </span>

            <h2 class="fw-bold text-primary">
                Fungsi UPTD Loka Latihan Kerja
            </h2>

            <p class="text-muted mx-auto"
               style="max-width: 800px;">

                Untuk menyelenggarakan tugas pokok tersebut, UPTD Loka
                Latihan Kerja mempunyai sejumlah fungsi dalam bidang
                pelatihan kerja dan pelayanan kepada masyarakat.

            </p>

        </div>


        <div class="row g-4">


            <!-- Fungsi 1 -->

            <div class="col-md-6 col-lg-4">

                <div class="card shadow-sm border-0 h-100 fungsi-card">

                    <div class="card-body p-4">

                        <div class="fungsi-icon bg-primary text-white">

                            <i class="bi bi-calendar-check"></i>

                        </div>

                        <h5 class="fw-bold mt-4">
                            Penyusunan Rencana dan Program
                        </h5>

                        <p class="text-muted">
                            Penyusunan rencana dan program kerja UPTD
                            Loka Latihan Kerja.
                        </p>

                    </div>

                </div>

            </div>


            <!-- Fungsi 2 -->

            <div class="col-md-6 col-lg-4">

                <div class="card shadow-sm border-0 h-100 fungsi-card">

                    <div class="card-body p-4">

                        <div class="fungsi-icon bg-success text-white">

                            <i class="bi bi-gear-fill"></i>

                        </div>

                        <h5 class="fw-bold mt-4">
                            Pelaksanaan Teknis
                        </h5>

                        <p class="text-muted">
                            Pelaksanaan kegiatan teknis di bidang
                            Loka Latihan Kerja.
                        </p>

                    </div>

                </div>

            </div>


            <!-- Fungsi 3 -->

            <div class="col-md-6 col-lg-4">

                <div class="card shadow-sm border-0 h-100 fungsi-card">

                    <div class="card-body p-4">

                        <div class="fungsi-icon bg-warning text-dark">

                            <i class="bi bi-chat-square-text-fill"></i>

                        </div>

                        <h5 class="fw-bold mt-4">
                            Bimbingan dan Penyuluhan
                        </h5>

                        <p class="text-muted">
                            Pelaksanaan bimbingan dan penyuluhan
                            di bidang latihan kerja.
                        </p>

                    </div>

                </div>

            </div>


            <!-- Fungsi 4 -->

            <div class="col-md-6 col-lg-4">

                <div class="card shadow-sm border-0 h-100 fungsi-card">

                    <div class="card-body p-4">

                        <div class="fungsi-icon bg-danger text-white">

                            <i class="bi bi-person-check-fill"></i>

                        </div>

                        <h5 class="fw-bold mt-4">
                            Pelayanan Pelatihan
                        </h5>

                        <p class="text-muted">
                            Pelaksanaan pelayanan di bidang
                            latihan kerja kepada masyarakat.
                        </p>

                    </div>

                </div>

            </div>


            <!-- Fungsi 5 -->

            <div class="col-md-6 col-lg-4">

                <div class="card shadow-sm border-0 h-100 fungsi-card">

                    <div class="card-body p-4">

                        <div class="fungsi-icon bg-info text-white">

                            <i class="bi bi-tools"></i>

                        </div>

                        <h5 class="fw-bold mt-4">
                            Kegiatan Teknis Operasional
                        </h5>

                        <p class="text-muted">
                            Pelaksanaan kegiatan teknis operasional
                            di bidang latihan kerja.
                        </p>

                    </div>

                </div>

            </div>


            <!-- Fungsi 6 -->

            <div class="col-md-6 col-lg-4">

                <div class="card shadow-sm border-0 h-100 fungsi-card">

                    <div class="card-body p-4">

                        <div class="fungsi-icon bg-secondary text-white">

                            <i class="bi bi-diagram-3-fill"></i>

                        </div>

                        <h5 class="fw-bold mt-4">
                            Teknis Fungsional
                        </h5>

                        <p class="text-muted">
                            Pelaksanaan teknis fungsional di bidang
                            latihan kerja.
                        </p>

                    </div>

                </div>

            </div>


            <!-- Fungsi 7 -->

            <div class="col-md-6 col-lg-4">

                <div class="card shadow-sm border-0 h-100 fungsi-card">

                    <div class="card-body p-4">

                        <div class="fungsi-icon bg-primary text-white">

                            <i class="bi bi-folder-fill"></i>

                        </div>

                        <h5 class="fw-bold mt-4">
                            Administrasi dan Ketatausahaan
                        </h5>

                        <p class="text-muted">
                            Penyelenggaraan pembinaan administrasi
                            ketatausahaan UPTD Loka Latihan Kerja.
                        </p>

                    </div>

                </div>

            </div>


            <!-- Fungsi 8 -->

            <div class="col-md-6 col-lg-4">

                <div class="card shadow-sm border-0 h-100 fungsi-card">

                    <div class="card-body p-4">

                        <div class="fungsi-icon bg-success text-white">

                            <i class="bi bi-people-fill"></i>

                        </div>

                        <h5 class="fw-bold mt-4">
                            Komunikasi dan Kerja Sama
                        </h5>

                        <p class="text-muted">
                            Penyelenggaraan komunikasi, koordinasi,
                            konsultasi, dan kerja sama di bidang
                            latihan kerja.
                        </p>

                    </div>

                </div>

            </div>


            <!-- Fungsi 9 -->

            <div class="col-md-6 col-lg-4">

                <div class="card shadow-sm border-0 h-100 fungsi-card">

                    <div class="card-body p-4">

                        <div class="fungsi-icon bg-warning text-dark">

                            <i class="bi bi-file-earmark-text-fill"></i>

                        </div>

                        <h5 class="fw-bold mt-4">
                            Administrasi Ketatausahaan
                        </h5>

                        <p class="text-muted">
                            Pelaksanaan administrasi ketatausahaan
                            dalam mendukung kegiatan UPTD.
                        </p>

                    </div>

                </div>

            </div>


            <!-- Fungsi 10 -->

            <div class="col-md-6 mx-md-auto">

                <div class="card shadow-sm border-0 h-100 fungsi-card">

                    <div class="card-body p-4">

                        <div class="fungsi-icon bg-danger text-white">

                            <i class="bi bi-check2-circle"></i>

                        </div>

                        <h5 class="fw-bold mt-4">
                            Tugas Kedinasan Lain
                        </h5>

                        <p class="text-muted">
                            Pelaksanaan tugas kedinasan lain sesuai
                            dengan bidang tugas dan fungsinya.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ==========================================
     DASAR HUKUM
========================================== -->

<section class="py-5">

    <div class="container">

        <div class="card border-0 shadow bg-primary text-white">

            <div class="card-body text-center p-4 p-lg-5">

                <i class="bi bi-journal-text display-5 mb-3"></i>

                <h3 class="fw-bold">
                    Dasar Hukum
                </h3>

                <p class="mb-0">

                    Peraturan Bupati Indramayu Nomor 18 Tahun 2009

                </p>

                <small class="d-block mt-2 opacity-75">

                    Dasar pelaksanaan tugas pokok dan fungsi UPTD
                    Balai Latihan Kerja Kabupaten Indramayu.

                </small>

            </div>

        </div>

    </div>

</section>


@include('dashboard.footer')

@endsection
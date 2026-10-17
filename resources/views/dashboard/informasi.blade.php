<section id="informasi" class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Informasi BLK
            </h2>

            <p class="section-subtitle">
                Ikuti berbagai kegiatan, baca pengalaman alumni, dan lihat informasi terbaru dari BLK Kabupaten Indramayu.
            </p>

        </div>

        <div class="row g-4">

            <!-- Galeri -->

            <div class="col-lg-4">

                <div class="card h-100 shadow">

                    <img src="{{ asset('assets/image/informasi/galeri.jpg') }}"
                        class="card-img-top"
                        alt="Galeri">

                    <div class="card-body text-center">

                        <i class="bi bi-images text-primary display-4"></i>

                        <h4 class="mt-3 fw-bold">

                            Galeri Kegiatan

                        </h4>

                        <p>

                            Dokumentasi kegiatan pelatihan, seminar, praktik, dan aktivitas peserta BLK.

                        </p>

                    </div>

                    <div class="card-footer bg-white border-0">

                        <a href="{{ url('/galeri') }}"
                            class="btn btn-primary w-100">

                            Lihat Galeri

                        </a>

                    </div>

                </div>

            </div>

            <!-- Testimoni -->

            <div class="col-lg-4">

                <div class="card h-100 shadow">

                    <img src="{{ asset('assets/image/informasi/testimoni.jpg') }}"
                        class="card-img-top"
                        alt="Testimoni">

                    <div class="card-body text-center">

                        <i class="bi bi-chat-square-quote text-success display-4"></i>

                        <h4 class="mt-3 fw-bold">

                            Testimoni Alumni

                        </h4>

                        <p>

                            Cerita dan pengalaman alumni setelah mengikuti pelatihan di BLK Kabupaten Indramayu.

                        </p>

                    </div>

                    <div class="card-footer bg-white border-0">

                        <a href="{{ url('/testimoni') }}"
                            class="btn btn-success w-100">

                            Baca Testimoni

                        </a>

                    </div>

                </div>

            </div>

            <!-- LOGIN ADMIN -->

<li class="nav-item ms-lg-2 mt-2 mt-lg-0">

    <a href="{{ route('admin.login') }}"
        class="btn btn-outline-light fw-bold">

        <i class="bi bi-person-lock me-1"></i>
        Admin

    </a>

</li>


<!-- DAFTAR PELATIHAN -->

<li class="nav-item ms-lg-2 mt-2 mt-lg-0">

    <a href="{{ url('/pendaftaran') }}"
        class="btn btn-warning fw-bold">

        <i class="bi bi-pencil-square me-1"></i>
        Daftar Pelatihan

    </a>

</li>
            <!-- Pengumuman -->

            <div class="col-lg-4">

                <div class="card h-100 shadow">

                    <img src="{{ asset('assets/image/informasi/pengumuman.jpg') }}"
                        class="card-img-top"
                        alt="Pengumuman">

                    <div class="card-body text-center">

                        <i class="bi bi-megaphone-fill text-danger display-4"></i>

                        <h4 class="mt-3 fw-bold">

                            Pengumuman

                        </h4>

                        <p>

                            Informasi pembukaan pelatihan, jadwal seleksi, dan pengumuman penting lainnya.

                        </p>

                    </div>

                    <div class="card-footer bg-white border-0">

                        <a href="{{ url('/pengumuman') }}"
                            class="btn btn-danger w-100">

                            Lihat Pengumuman

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
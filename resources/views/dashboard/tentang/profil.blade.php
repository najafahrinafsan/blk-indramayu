@extends('layouts.app')

@section('title', 'Profil BLK')

@section('content')

@include('dashboard.navbar')

<style>
.hero-profile{
    background: linear-gradient(135deg,#0d6efd,#0a58ca);
    position:relative;
    overflow:hidden;
}
.hero-profile::before{
    content:'';
    position:absolute;
    width:320px;
    height:320px;
    background:rgba(255,255,255,.08);
    border-radius:50%;
    top:-120px;
    right:-80px;
}
.hero-profile::after{
    content:'';
    position:absolute;
    width:220px;
    height:220px;
    background:rgba(255,255,255,.05);
    border-radius:50%;
    bottom:-90px;
    left:-70px;
}
.hero-profile .container{
    position:relative;
    z-index:2;
}
.profile-card{
    background:#fff;
    border-radius:22px;
    overflow:hidden;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
}
.profile-image img{
    width:100%;
    height:100%;
    object-fit:cover;
}
.profile-content{
    padding:40px;
}
.profile-content p{
    text-align:justify;
    line-height:1.9;
    color:#5f6368;
}
.profile-badge{
    display:inline-block;
    background:#eaf3ff;
    color:#0d6efd;
    padding:8px 16px;
    border-radius:30px;
    font-size:14px;
    font-weight:600;
}
.stat-box{
    background:#fff;
    border-radius:18px;
    padding:25px;
    text-align:center;
    box-shadow:0 10px 30px rgba(0,0,0,.06);
    transition:.3s;
}
.stat-box:hover{
    transform:translateY(-6px);
}
.stat-icon{
    width:65px;
    height:65px;
    margin:auto;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#0d6efd;
    color:white;
    font-size:28px;
    margin-bottom:18px;
}
.vm-card{
    background:white;
    border:none;
    border-radius:20px;
    padding:35px;
    box-shadow:0 10px 35px rgba(0,0,0,.07);
    transition:.3s;
    height:100%;
}
.vm-card:hover{
    transform:translateY(-6px);
}
.vm-icon{
    width:70px;
    height:70px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-size:30px;
    margin-bottom:20px;
}
.vm-card ul{
    padding-left:20px;
}
.vm-card li{
    margin-bottom:12px;
    color:#5f6368;
}
.cta-section{
    background:linear-gradient(135deg,#0d6efd,#0b5ed7);
    color:white;
    border-radius:24px;
    padding:60px 30px;
}
@media(max-width:768px){
    .profile-content{
        padding:28px;
    }
}
</style>

<!-- HERO -->
<section class="hero-profile text-white py-5">
    <div class="container text-center py-4">
        <span class="badge bg-light text-primary px-3 py-2 mb-3">
            BALAI LATIHAN KERJA
        </span>

        <h1 class="display-5 fw-bold">
            Profil BLK Kabupaten Indramayu
        </h1>

        <p class="lead mx-auto" style="max-width:760px;">
            Mengenal lebih dekat Balai Latihan Kerja Kabupaten Indramayu
            sebagai pusat pengembangan kompetensi tenaga kerja yang siap
            menghadapi dunia kerja dan dunia industri.
        </p>
    </div>
</section>

<!-- PROFIL -->
<section class="py-5">
    <div class="container">

        <div class="profile-card">

            <div class="row g-0 align-items-center">

                <div class="col-lg-5 profile-image">
                    <img src="{{ asset('assets/image/galeri/profil2.jpeg') }}"
                         alt="Profil BLK">
                </div>

                <div class="col-lg-7">

                    <div class="profile-content">

                        <span class="profile-badge">
                            Tentang BLK
                        </span>

                        <h2 class="fw-bold text-primary mt-3 mb-4">
                            Membangun SDM Berkualitas dan Kompeten
                        </h2>

                        <p>
                            Balai Latihan Kerja (BLK) Kabupaten Indramayu merupakan
                            Unit Pelaksana Teknis Daerah (UPTD) di bawah Dinas Tenaga
                            Kerja Kabupaten Indramayu yang menyelenggarakan pelatihan
                            berbasis kompetensi sesuai kebutuhan dunia usaha dan dunia
                            industri.
                        </p>

                        <p>
                            Melalui berbagai program pelatihan, BLK berkomitmen
                            mencetak tenaga kerja yang profesional, disiplin, produktif,
                            serta memiliki daya saing tinggi di tingkat nasional maupun
                            internasional.
                        </p>

                        <p class="mb-0">
                            Selain membekali peserta dengan keterampilan teknis,
                            BLK juga mendorong pengembangan kewirausahaan sehingga
                            lulusan mampu menciptakan peluang kerja secara mandiri.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>
</section>


<!-- VISI MISI -->
<section class="py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <span class="badge bg-primary px-3 py-2 mb-3">
                ARAH PENGEMBANGAN
            </span>
            <h2 class="fw-bold text-primary">
                Visi & Misi BLK
            </h2>
        </div>

        <div class="row g-4">

            <div class="col-lg-6">

                <div class="vm-card">

                    <div class="vm-icon bg-primary">
                        <i class="bi bi-eye-fill"></i>
                    </div>

                    <h3 class="fw-bold text-primary">
                        Visi
                    </h3>

                    <p class="mb-0 text-muted">
                        Terwujudnya Balai Latihan Kerja (BLK) yang
                        **unggul, maju, mandiri, profesional,
                        dan berdaya saing.**
                    </p>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="vm-card">

                    <div class="vm-icon bg-success">
                        <i class="bi bi-bullseye"></i>
                    </div>

                    <h3 class="fw-bold text-success">
                        Misi
                    </h3>

                    <ul class="mt-3">
                        <li>Meningkatkan kualitas SDM.</li>
                        <li>Meningkatkan kompetensi tenaga kerja.</li>
                        <li>Memperluas kesempatan kerja.</li>
                        <li>Mewujudkan hubungan industrial yang harmonis.</li>
                        <li>Meningkatkan sarana dan prasarana workshop.</li>
                    </ul>

                </div>

            </div>

        </div>

    </div>
</section>

<!-- CTA -->
<section class="py-5">
    <div class="container">

        <div class="cta-section text-center">

            <h2 class="fw-bold mb-3">
                Siap Mengembangkan Kompetensi?
            </h2>

            <p class="mb-4 fs-5">
                Bergabunglah bersama BLK Kabupaten Indramayu dan
                tingkatkan keterampilan untuk masa depan yang lebih baik.
            </p>

            <a href="{{ route('pelatihan') }}"
               class="btn btn-warning btn-lg fw-bold px-4">
                <i class="bi bi-arrow-right-circle me-2"></i>
                Lihat Program Pelatihan
            </a>

        </div>

    </div>
</section>

@include('dashboard.footer')

@endsection
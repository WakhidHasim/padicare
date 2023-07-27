@extends('layouts.app', ['title' => 'Home'])

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <h1>PadiCare</h1>
            <h2>Sistem Pakar Diagnosa Penyakit Atau Hama Pada Tanaman Padi.</h2>
            <a href="{{ route('biodata.index') }}" class="btn-get-started">Mulai Diagnosa</a>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">
        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container" data-aos="fade-up">
                <div class="col-lg-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-receipt"></i>
                                    <h4>Konsultasi Ahli Pertanian</h4>
                                    <p>
                                        Layanan ini menyediakan akses ke ahli pertanian yang dapat memberikan saran dan
                                        konsultasi terkait masalah pertanian yang dihadapi oleh pengguna.
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-cube-alt"></i>
                                    <h4>Identifikasi Hama dan Penyakit</h4>
                                    <p>
                                        Pengguna akan menerima laporan identifikasi yang mencakup informasi tentang hama
                                        atau penyakit yang terdeteksi, serta langkah-langkah pengendalian yang
                                        direkomendasikan.
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="icon-box mt-4 mt-xl-0">
                                    <i class="bx bx-images"></i>
                                    <h4>Manajemen Hama dan Gulma</h4>
                                    <p>
                                        Layanan ini dirancang untuk membantu dalam identifikasi, pengendalian, dan
                                        pengelolaan hama serta gulma yang mempengaruhi tanaman Anda. Tim kami akan
                                        memberikan solusi terbaik untuk mengurangi kerusakan tanaman akibat serangan hama
                                        dan pertumbuhan gulma yang tidak diinginkan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .content-->
                </div>
            </div>
        </section>
        <!-- End Why Us Section -->
    </main>
    <!-- End #main -->
@endsection

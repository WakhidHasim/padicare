@extends('layouts.app', ['title' => 'Anggota Kelompok'])

@section('content')
    <main id="main" data-aos="fade-in">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Anggota Kelompok</h2>
            </div>
        </div>
        <!-- End Breadcrumbs -->

        <!-- ======= Trainers Section ======= -->
        <section id="trainers" class="trainers">
            <div class="container" data-aos="fade-up">
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <img src="{{ asset('images/feby.jpg') }}" class="img-fluid" alt="" height="200px">
                            <div class="member-content">
                                <h4>Feby Dian Maulana</h4>
                                <span>22.22.2485</span>
                                <p>
                                    Membuat Pohon Keputusan
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <img src="{{ asset('images/wakhid.png') }}" class="img-fluid" alt="" height="200px">
                            <div class="member-content">
                                <h4>Wakhid Hasim</h4>
                                <span>22.22.2497</span>
                                <p>
                                    Backend Website
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <img src="{{ asset('images/fikri.jpeg') }}" class="img-fluid" alt="" height="200px">
                            <div class="member-content">
                                <h4>Muhammad Fikri Khairullah</h4>
                                <span>22.22.2503</span>
                                <p>
                                    Mencari Referensi Sistem Pakar
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <img src="{{ asset('images/rizkista.jpg') }}" class="img-fluid" alt="" height="200px">
                            <div class="member-content">
                                <h4>Rizkista Ichsan Harnanto</h4>
                                <span>22.22.2507</span>
                                <p>
                                    Frontend Website
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <img src="{{ asset('images/yusuf.jpeg') }}" class="img-fluid" alt="" height="200px">
                            <div class="member-content">
                                <h4>Muhamad Yusuf</h4>
                                <span>22.22.2497</span>
                                <p>
                                    Membuat Perhitungan Certainy Factor
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Trainers Section -->
    </main>
    <!-- End #main -->
@endsection

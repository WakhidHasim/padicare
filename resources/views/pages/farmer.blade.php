@extends('layouts.app', ['title' => 'Analisis Penyakit'])

@section('content')
    <main id="main" data-aos="fade-in">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Data Petani</h2>
            </div>
        </div>
        <!-- End Breadcrumbs -->

        <!-- ======= Trainers Section ======= -->
        <section id="trainers" class="trainers">
            <div class="container" data-aos="fade-up">
                <form action="{{ route('biodata.store') }}" method="post">
                    @csrf
                    <div class="row mb-3 justify-content-center">
                        <!-- Modified: Added "justify-content-center" class -->
                        <div class="col-md-6">
                            <div class="card d-flex">
                                <!-- Modified: Added "d-flex" class -->
                                <div class="card-body">
                                    <h3>Data Petani</h3>
                                    <hr>
                                    <div class="form-group">
                                        <label for="farmer_name">Nama Petani</label>
                                        <input type="text" class="form-control" id="farmer_name" name="farmer_name"
                                            placeholder="Masukkan Nama Petani">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">No. Handphone</label>
                                        <input type="number" class="form-control" id="phone_number" name="phone_number"
                                            placeholder="Masukkan Nomor Handphone Petani">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Alamat</label>
                                        <textarea class="form-control" id="address" name="address" cols="15" rows="5"
                                            placeholder="Masukkan Alamat Petani"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-md" id="kirim">Kirim</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- End Trainers Section -->
    </main>
    <!-- End #main -->
@endsection

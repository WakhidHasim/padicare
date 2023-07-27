@extends('layouts.app', ['title' => 'Analisis Penyakit'])

@section('content')
    <main id="main" data-aos="fade-in">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Analisis Penyakit</h2>
            </div>
        </div>
        <!-- End Breadcrumbs -->

        <section class="inn">
            <div class="container">
                <div class="col-md-6">
                    <h3 class="mb-4 mb-4">Identitas Petani:</h3>
                    <table border="0" class="table">
                        <tr>
                            <td>Nama Petani</td>
                            <td>:</td>
                            <td>{{ Str::title(Session('biodata')['farmer_name']) }}</td>
                        </tr>
                        <tr>
                            <td>No. HP</td>
                            <td>:</td>
                            <td>{{ Session('biodata')['phone_number'] }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ Str::title(Session('biodata')['address']) }}</td>
                        </tr>
                    </table>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <div class='alert alert-success alert-dismissible'>
                            <h4><i class="bi bi-exclamation-triangle"></i>&nbsp;Perhatian !</h4>
                            <p>Silahkan pilih gejala yang sesuai dengan kondisi tanaman padi anda</p>
                        </div>
                        <form action="{{ route('diagnosis.analisis') }}" method="post">
                            @csrf
                            <table class="table tabled-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Gejala</th>
                                        <th scope="col">Kondisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($symptoms as $symptom)
                                        <tr>
                                            <th scope="row" width="10%">{{ $loop->iteration }}</th>
                                            <td>{{ Str::title($symptom->symptom_name) }}</td>
                                            <td width="25%">
                                                <div class="form-group">
                                                    <select name="condition[]" id="condition" class="form-control">
                                                        <option disabled selected>Pilih</option>
                                                        <option value="{{ $symptom->id }}_1">Pasti</option>
                                                        <option value="{{ $symptom->id }}_2">Hampir pasti</option>
                                                        <option value="{{ $symptom->id }}_3">Mungkin</option>
                                                        <option value="{{ $symptom->id }}_4">Ragu-ragu</option>
                                                        <option value="{{ $symptom->id }}_0">Tidak</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="card-footer d-flex justify-content-between">
                                <button type="submit" class="btn btn-success">Analisa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- End #main -->
@endsection

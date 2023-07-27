@extends('layouts.app', ['title' => 'Hasil Analisis Penyakit'])

@section('content')
    <main id="main" data-aos="fade-in">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Hasil Analisis Penyakit</h2>
            </div>
        </div>
        <!-- End Breadcrumbs -->

        <section class="inn">
            <div class="container">
                <h2 class="text-center mb-2 fw-bold">Hasil Diagnosa</h2>
                <hr class="mb-4">
                <div class="pilihan" class="mt-4">
                    <h3 style="font-size: 25px" class="mb-2">Pilihan Pengguna</h3>
                    <table class="table table-bordered table-hovered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gejala</th>
                                <th>Kondisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($symptoms as $symptom)
                                @foreach ($certainty as $key => $ct)
                                    @if ($symptom->id == $key)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>{{ $symptom->symptom_name }}</td>
                                            <td>
                                                @if ($ct == 1)
                                                    Pasti
                                                @elseif($ct == 2)
                                                    Hampir pasti
                                                @elseif($ct == 3)
                                                    Mungkin
                                                @elseif($ct == 4)
                                                    Ragu-ragu
                                                @else
                                                    Tidak
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="my-4"></div>
                @foreach ($diseases as $disease)
                    @if ($disease->id == array_key_first($resultCF))
                        <div class="row bg-light rounded-sm mt-4">
                            <div class="col-md-6 p-3">
                                <h3 style="font-size: 25px" class="mb-4">Hasil Diagnosa</h3>
                                <p>Berdasarkan daftar gejala yang dipilih, Penyakit yang diderita tanaman padi anda :
                                </p>
                                <h4 style="font-size: 22px" class="mb-3 text-success">{{ $disease->disease_name }}</h4>
                                <p style="font-size: 20px" class="text-success">Presentase :
                                    {{ $resultCF[array_key_first($resultCF)] * 100 }}%</p>
                            </div>
                        </div>
                        <div class="my-4"></div>
                        <div class="card">
                            <div class="card-body">
                                <h3 style="font-size: 25px" class="mb-2">Deskripsi penyakit</h3>
                                <br>
                                {!! $disease->description !!}
                            </div>
                        </div>
                        <div class="my-4"></div>
                        <div class="card">
                            <div class="card-body">
                                <h3 style="font-size: 25px" class="mb-2">Solusi penyakit</h3>
                                <br>
                                {!! $disease->solution !!}
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="my-4"></div>
                <div id="kemungkinan" class="mt-4 no-print">
                    <div class="card">
                        <div class="card-body">
                            <h3 style="font-size: 25px" class="mb-2">Kemungkinan penyakit lain</h3>
                            <br>
                            <table class="table table-bordered table-hovered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kemungkinan Penyakit Lain</th>
                                        <th>Presentase</th>
                                    </tr>
                                </thead>
                                <tbody id="plain">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($resultCF as $key => $cf)
                                        @foreach ($diseases as $disease)
                                            @if ($key == $disease->id)
                                                @if ($i <= 3)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $disease->disease_name }}</td>
                                                        <td>{{ $cf * 100 }}%</td>
                                                    </tr>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- End #main -->
@endsection

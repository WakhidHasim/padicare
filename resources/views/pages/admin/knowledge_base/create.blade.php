@extends('layouts.admin.app', ['title' => 'Tambah Data Basis Pengetahuan'])

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Basis Pengetahuan</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('dashboard') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('knowledge_bases.index') }}">Data Basis Pengetahuan</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tambah Data Basis Pengetahuan</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('knowledge_bases.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="symptom_id">Nama Gejala</label>
                            <select class="form-control cb @error('symptom_id') is-invalid @enderror" id="symptom_id"
                                name="symptom_id">
                                <option disabled selected>Pilih Gejala</option>
                                @foreach ($symptoms as $symptom)
                                    <option value="{{ $symptom->id }}">{{ $symptom->symptom_name }}</option>
                                @endforeach
                            </select>
                            @error('disease_id')
                                <small id="symptomIdHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="disease_id">Nama Penyakit</label>
                            <select class="form-control cb @error('disease_id') is-invalid @enderror" id="disease_id"
                                name="disease_id">
                                <option disabled selected>Pilih Penyakit</option>
                                @foreach ($diseases as $disease)
                                    <option value="{{ $disease->id }}">{{ $disease->disease_name }}</option>
                                @endforeach
                            </select>
                            @error('disease_id')
                                <small id="diseaseIdHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="certainty_factor">Faktor Kepastian</label>
                            <select name="certainty_factor" id="certainty_factor" class="form-control">
                                <option value="" selected readonly>Pilih</option>
                                <option value="1">Sangat berpengaruh (1.0)</option>
                                <option value="0.8">Berpengaruh (0.8)</option>
                                <option value="0.6">Cukup berpengaruh (0.6)</option>
                                <option value="0.4">Kurang berpengaruh (0.4)</option>
                                <option value="0.2">Tidak tahu (0.2)</option>
                            </select>
                            @error('certainty_factor')
                                <small id="certaintyFactorNameHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary ml-2">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

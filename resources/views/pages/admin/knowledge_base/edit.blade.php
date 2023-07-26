@extends('layouts.admin.app', ['title' => 'Edit Data Basis Pengetahuan'])

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
                        <a href="#">Edit Data Basis Pengetahuan</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('knowledge_bases.update', $knowledge_base->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="symptom_id">Nama Gejala</label>
                            <select class="form-control cb @error('symptom_id') is-invalid @enderror" id="symptom_id"
                                name="symptom_id">
                                <option disabled selected>Pilih Gejala</option>
                                @foreach ($symptoms as $symptom)
                                    <option value="{{ $symptom->id }}"
                                        {{ $knowledge_base->symptom_id == $symptom->id ? 'selected' : null }}>
                                        {{ $symptom->symptom_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('symptom_id')
                                <small id="symptomIdHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="disease_id">Nama Penyakit</label>
                            <select class="form-control cb @error('disease_id') is-invalid @enderror" id="disease_id"
                                name="disease_id">
                                <option disabled selected>Pilih Penyakit</option>
                                @foreach ($diseases as $disease)
                                    <option value="{{ $disease->id }}"
                                        {{ $knowledge_base->disease_id == $disease->id ? 'selected' : null }}>
                                        {{ $disease->disease_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('disease_id')
                                <small id="diseaseIdHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="certainty_factor">Faktor Kepastian</label>
                            <select name="certainty_factor" id="certainty_factor" class="form-control">
                                <option value="" selected disabled>Pilih</option>
                                <option value="1" {{ $knowledge_base->certainty_factor == 1 ? 'selected' : null }}>
                                    Sangat
                                    berpengaruh</option>
                                <option value="0.8" {{ $knowledge_base->certainty_factor == 0.8 ? 'selected' : null }}>
                                    Berpengaruh
                                </option>
                                <option value="0.6" {{ $knowledge_base->certainty_factor == 0.6 ? 'selected' : null }}>
                                    Cukup
                                    berpengaruh</option>
                                <option value="0.4" {{ $knowledge_base->certainty_factor == 0.4 ? 'selected' : null }}>
                                    Kurang
                                    berpengaruh</option>
                                <option value="0.2" {{ $knowledge_base->certainty_factor == 0.2 ? 'selected' : null }}>
                                    Tidak tahu
                                </option>
                            </select>
                            @error('certainty_factor')
                                <small id="certaintyFactorNameHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary ml-2">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

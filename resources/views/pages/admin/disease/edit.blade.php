@extends('layouts.admin.app', ['title' => 'Edit Data Penyakit'])

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Penyakit</h4>
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
                        <a href="{{ route('diseases.index') }}">Data Penyakit</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Data Penyakit</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('diseases.update', $disease->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="id">Kode Penyakit</label>
                            <input type="text" class="form-control  @error('id') is-invalid @enderror" id="id"
                                aria-describedby="idHelp" name="id" value="{{ $disease->id }}" readonly>
                            @error('id')
                                <small id="idHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Penyakit</label>
                            <input type="text" class="form-control  @error('disease_name') is-invalid @enderror"
                                id="disease_name" aria-describedby="diseaseNameHelp" name="disease_name"
                                value="{{ old('disease_name', $disease->disease_name) }}" autofocus>
                            @error('disease_name')
                                <small id="diseaseNameHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="description">Deskripsi Penyakit</label>
                            @error('description')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                            <input id="description" type="hidden" name="description"
                                value="{{ old('description', $disease->description) }}">
                            <trix-editor input="description"></trix-editor>
                        </div>
                        <div class="form-group">
                            <label class="solution">Solusi Penyakit</label>
                            @error('solution')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                            <input id="solution" type="hidden" name="solution"
                                value="{{ old('solution', $disease->solution) }}">
                            <trix-editor input="solution"></trix-editor>
                        </div>
                        <button type="submit" class="btn btn-primary ml-2">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

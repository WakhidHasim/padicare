@extends('layouts.admin.app', ['title' => 'Tambah Data Gejala'])

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Gejala</h4>
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
                        <a href="{{ route('symptoms.index') }}">Data Gejala</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tambah Data Gejala</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('symptoms.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="id">Kode Gejala</label>
                            <input type="text" class="form-control  @error('id') is-invalid @enderror" id="id"
                                aria-describedby="idHelp" name="id" value="{{ $generateId }}" readonly>
                            @error('id')
                                <small id="idHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Gejala</label>
                            <input type="text" class="form-control  @error('symptom_name') is-invalid @enderror"
                                id="symptom_name" aria-describedby="symptomNameHelp" name="symptom_name"
                                value="{{ old('symptom_name') }}" autofocus>
                            @error('symptom_name')
                                <small id="symptomNameHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary ml-2">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

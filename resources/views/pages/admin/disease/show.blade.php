@extends('layouts.admin.app', ['title' => 'Detail Data Penyakit'])

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
                        <a href="{{ route('symptoms.index') }}">Data Penyakit</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Detail Data Penyakit</a>
                    </li>
                </ul>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Penyakit {{ $disease->disease_name }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p><strong>Kode Penyakit :</strong></p>
                                <p>{{ $disease->id }}</p>
                            </div>
                            <div class="col-6">
                                <p><strong>Nama Penyakit :</strong></p>
                                <p>{{ $disease->disease_name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Deskripsi Penyakit :</strong></p>
                                <p>{!! $disease->description !!}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Solusi Penyakit :</strong></p>
                                <p>{!! $disease->solution !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="{{ route('diseases.edit', $disease->id) }}" class="btn btn-primary mr-3"><i
                                        class="fa fa-edit"></i> Edit</a>
                                <a href="{{ route('diseases.index') }}" class="btn btn-warning"><i
                                        class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

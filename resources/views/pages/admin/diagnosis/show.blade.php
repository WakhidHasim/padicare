@extends('layouts.admin.app', ['title' => 'Detail Data Diagnosis'])

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Diagnosis</h4>
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
                        <a href="{{ route('diagnoses.index') }}">Data Diagnosis</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Detail Data Diagnosis</a>
                    </li>
                </ul>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Data Diagnosis</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <p><strong>Nama Petani :</strong></p>
                                <p>{{ $diagnosis->farmer_name }}</p>
                            </div>
                            <div class="col-4">
                                <p><strong>No Handphone Petani :</strong></p>
                                <p>{{ $diagnosis->phone_number }}</p>
                            </div>
                            <div class="col-4">
                                <p><strong>Alamat Petani :</strong></p>
                                <p>{{ $diagnosis->address }}</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-12 text-right">
                                <a href="{{ route('diagnoses.index') }}" class="btn btn-warning"><i
                                        class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

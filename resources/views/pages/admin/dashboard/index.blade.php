@extends('layouts.admin.app', ['title' => 'Beranda'])

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Beranda</h4>
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
                        <a href="">Beranda</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers width-full">
                                        <p class="card-category">Gelaja</p>
                                        <h4 class="card-title">{{ $symptoms }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers width-full">
                                        <p class="card-category">Penyakit</p>
                                        <h4 class="card-title">{{ $diseases }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers width-full">
                                        <p class="card-category">Basis Pengetahuan</p>
                                        <h4 class="card-title">{{ $knowledge_bases }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers width-full">
                                        <p class="card-category">Diagnosis</p>
                                        <h4 class="card-title">{{ $diagnoses }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

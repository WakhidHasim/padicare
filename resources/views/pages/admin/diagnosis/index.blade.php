@extends('layouts.admin.app', ['title' => 'Data Diagnosis'])

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
                        <a href="#">Data Diagnosis</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Petani</th>
                                            <th>Alamat Petani</th>
                                            <th>Nama Penyakit</th>
                                            <th>Presentase</th>
                                            <th style="width: 10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($diagnoses as $diagnosis)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $diagnosis->farmer_name }}</td>
                                                <td>{{ $diagnosis->address }}</td>
                                                <td>{{ $diagnosis->disease->disease_name }}</td>
                                                <td>{{ $diagnosis->presentase }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ route('diagnoses.edit', $diagnosis->id) }}"
                                                            class="btn btn-link btn-primary btn-lg">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form method="POST"
                                                            action="{{ route('diagnoses.destroy', $diagnosis->id) }}">
                                                            @csrf
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <button type="submit"
                                                                class="btn btn-link btn-danger show_confirm"
                                                                data-toggle="tooltip" title='Delete'>
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

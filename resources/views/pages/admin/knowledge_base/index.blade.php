@extends('layouts.admin.app', ['title' => 'Data Basis Pengetahuan'])

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
                        <a href="#">Data Basis Pengetahuan</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tabel Data Basis Pengetahuan</h4>
                                <a href="{{ route('knowledge_bases.create') }}" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Gejala</th>
                                            <th>Nama Penyakit</th>
                                            <th>Nilai CF</th>
                                            <th style="width: 10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($knowledge_bases as $knowledge_base)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $knowledge_base->symptom->symptom_name }}</td>
                                                <td>{{ $knowledge_base->disease->disease_name }}</td>
                                                <td>{{ $knowledge_base->certainty_factor }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ route('knowledge_bases.edit', $knowledge_base->id) }}"
                                                            class="btn btn-link btn-primary btn-lg">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form method="POST"
                                                            action="{{ route('knowledge_bases.destroy', $knowledge_base->id) }}">
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

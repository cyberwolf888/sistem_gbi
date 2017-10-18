@extends('layouts.backend')

@push('plugin_css')
@endpush

@section('content')
    <div class="wrapper border-bottom page-heading">
        <div class="col-lg-12">
            <h2> Baptisan </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a href="#">Home</a> </li>
                <li class="breadcrumb-item"> <a> Baptisan </a> </li>
                <li class="breadcrumb-item active"> <strong>Detail</strong> </li>
            </ol>
        </div>
    </div>
    <div class="wrapper-content ">
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">

                    <div class="ibox-content collapse show">
                        <div class="widgets-container">

                            <div class="row">
                                <div class="col-lg-12" >
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <h5>Tgl Baptis</h5>
                                                <h3>{{ $model->tgl_baptis == null ? 'Belum ditentukan' : date('d F Y',strtotime($model->tgl_baptis)) }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Nama Ayah</h5>
                                                <h3>{{ $model->nama_ayah }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Nama Ibu</h5>
                                                <h3>{{ $model->nama_ibu }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Pekerjaan</h5>
                                                <h3>{{ $model->pekerjaan }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Status</h5>
                                                <h3>{{ $model->getStatus() }}</h3>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="ibox float-e-margins">

                    <div class="ibox-content collapse show">
                        <div class="widgets-container">

                            <div class="row">
                                <div class="col-lg-12" >
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <h5>Dibaptis Oleh</h5>
                                                <h3>{{ $model->dibaptis == null ? 'Belum ditentukan' : $model->dibaptis }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Agama Sebelum Dibaptis</h5>
                                                <h3>{{ $model->agama_sebelum == null ? 'Belum diisi' : $model->agama_sebelum }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Nama GKM/Konselor</h5>
                                                <h3>{{ $model->nama_gkm == null ? 'Belum ditentukan' : $model->nama_gkm }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Telp GKM/Konselor</h5>
                                                <h3>{{ $model->telp_gkm == null ? 'Belum ditentukan' : $model->telp_gkm }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Nama KM</h5>
                                                <h3>{{ $model->nama_km == null ? 'Belum ditentukan' : $model->nama_km }}</h3>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin_scripts')
@endpush

@push('scripts')
@endpush
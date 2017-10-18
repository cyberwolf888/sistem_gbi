@extends('layouts.backend')

@push('plugin_css')
@endpush

@section('content')
    <div class="wrapper border-bottom page-heading">
        <div class="col-lg-12">
            <h2> Pemberkatan Nikah </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a href="#">Home</a> </li>
                <li class="breadcrumb-item"> <a> Pemberkatan Nikah </a> </li>
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
                                                <h5>Nama Pasangan</h5>
                                                <h3>{{ $model->nama_p }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Tempat Lahir Pasangan</h5>
                                                <h3>{{ $model->tempat_lahir_p }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Tanggal Lahir Pasangan</h5>
                                                <h3>{{ date('d F Y',strtotime($model->tgl_lahir_p)) }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Tempat Tinggal Pasangan</h5>
                                                <h3>{{ $model->alamat_p }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Telp Pasangan</h5>
                                                <h3>{{ $model->telp_p }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Nama Ayah Pasangan</h5>
                                                <h3>{{ $model->nama_ayah_p }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Nama Ibu Pasangan</h5>
                                                <h3>{{ $model->nama_ibu_p }}</h3>
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
                                                <h5>Tanggal Acara</h5>
                                                <h3>{{ date('d F Y',strtotime($model->tgl_acara)) }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Tempat</h5>
                                                <h3>{{ $model->tempat }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Diselenggarakan Oleh</h5>
                                                <h3>{{ $model->oleh }}</h3>
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
        </div>
    </div>
@endsection

@push('plugin_scripts')
@endpush

@push('scripts')
@endpush
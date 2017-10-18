@extends('layouts.backend')

@push('plugin_css')
@endpush

@section('content')
    <div class="wrapper border-bottom page-heading">
        <div class="col-lg-12">
            <h2> Penyerahan Anak </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a href="#">Home</a> </li>
                <li class="breadcrumb-item"> <a> Penyerahan Anak </a> </li>
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
                                                <img src="{{ url('assets/anak/'.$model->img) }}" width="150" height="200">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Nama Anak</h5>
                                                <h3>{{ $model->nama_anak }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Anak ke</h5>
                                                <h3>{{ $model->anak_ke }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Pendeta</h5>
                                                <h3>{{ $model->pendeta == null ? 'Belum ditentukan' : $model->pendeta }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Satelit</h5>
                                                <h3>{{ $model->satelit == null ? 'Belum ditentukan' : $model->satelit }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Tgl Penyerahan</h5>
                                                <h3>{{ $model->tgl_penyerahan == null ? 'Belum ditentukan' : date('d F Y',strtotime($model->tgl_penyerahan)) }}</h3>
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
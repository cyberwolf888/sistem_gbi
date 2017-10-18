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
        @if($model->status == 1)
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#model-succes"><i class="fa fa-check"></i> Terima</button>
                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#model-danger"><i class="fa fa-times"></i> Tolak</button>
                </div>
            </div>
        @endif
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
                                                <h5>Nama Pengaju</h5>
                                                <h3>{{ $model->user->name }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Tempat Lahir</h5>
                                                <h3>{{ $model->user->tempat_lahir }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Tanggal Lahir</h5>
                                                <h3>{{ date('d F Y',strtotime($model->user->tgl_lahir)) }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Tempat Tinggal</h5>
                                                <h3>{{ $model->user->address }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Telp</h5>
                                                <h3>{{ $model->user->phone }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Nama Ayah</h5>
                                                <h3>{{ $model->user->nama_ayah }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Nama Ibu</h5>
                                                <h3>{{ $model->user->nama_ibu }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Jenis Kelamin</h5>
                                                <h3>{{ $model->user->getJenisKelamin() }}</h3>
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


        </div>

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


    <div class="modal fade modal-m" tabindex="-1" role="dialog" id="model-succes">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" >Terima</h4>
                </div>
                <div class="modal-body"> Apakah anda yakin menerima permintaan ini? </div>
                <div class="modal-footer">
                    {!! Form::open(['route' => 'admin.pemberkatannikah.terima', 'method' => 'post']) !!}
                    <input type="hidden" name="req_id" value="{{ $model->id }}">
                    <button type="submit" class="btn aqua" >Ya</button>
                    <button type="button" class="btn red" data-dismiss="modal">Tidak</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-m" tabindex="-1" role="dialog" id="model-danger">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" >Tolak</h4>
                </div>
                <div class="modal-body"> Apakah anda yakin menolak permintaan ini? </div>
                <div class="modal-footer">
                    {!! Form::open(['route' => 'admin.pemberkatannikah.tolak', 'method' => 'post']) !!}
                    <input type="hidden" name="req_id" value="{{ $model->id }}">
                    <button type="submit" class="btn aqua" >Ya</button>
                    <button type="button" class="btn red" data-dismiss="modal">Tidak</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin_scripts')
@endpush

@push('scripts')
@endpush
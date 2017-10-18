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
        @if($model->status == 1)
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#model-succes"><i class="fa fa-check"></i> Terima</button>
                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#model-danger"><i class="fa fa-times"></i> Tolak</button>
            </div>
        </div>
        @endif
        @if(session('error'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">{{ session('error') }}</div>
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
                                                <img src="{{ url('assets/profile/'.$model->user->img) }}" width="150" height="200">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Nama Orang Tua</h5>
                                                <h3>{{ $model->user->name }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Alamat</h5>
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
                                                <h5>Email</h5>
                                                <h3>{{ $model->user->email }}</h3>
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

    <div class="modal fade modal-m" tabindex="-1" role="dialog" id="model-succes">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" >Terima</h4>
                </div>
                <div class="modal-body"> Apakah anda yakin menerima permintaan ini? </div>
                <div class="modal-footer">
                    {!! Form::open(['route' => 'admin.penyerahananak.terima', 'method' => 'post']) !!}
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
                    {!! Form::open(['route' => 'admin.penyerahananak.tolak', 'method' => 'post']) !!}
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
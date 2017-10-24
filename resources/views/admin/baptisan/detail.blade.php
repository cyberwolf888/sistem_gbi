@extends('layouts.backend')

@push('plugin_css')
<link href="{{ url('assets/backend') }}/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
                                                <h5>Tgl Baptis</h5>
                                                <h3>{{ $model->tgl_baptis == null ? 'Belum ditentukan' : date('d F Y',strtotime($model->tgl_baptis)) }}</h3>
                                            </td>
                                        </tr>
                                        @if($model->user->img != null)
                                        <tr>
                                            <td>
                                                <img src="{{ url('assets/profile/'.$model->user->img) }}" width="150" height="200">
                                            </td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td>
                                                <h5>Nama Lengkap</h5>
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

    <div class="modal fade modal-m" tabindex="-1" role="dialog" id="model-succes">
        <div class="modal-dialog ">
            <div class="modal-content">
                {!! Form::open(['route' => 'admin.baptisan.terima', 'method' => 'post']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" >Terima</h4>
                </div>
                <div class="modal-body">
                    Apakah anda yakin menerima permintaan ini?
                    <hr>
                    <div class="form-group">
                        {!! Form::label('tgl_baptis', 'Tanggal Baptis') !!}
                        <div class="input-group date form_date " data-date="" data-date-format="dd MM yyyy" data-link-field="tgl_baptis"
                             data-link-format="yyyy-mm-dd" data-required="true">
                            <input class="form-control" size="16" type="text" value="" readonly required>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                        <input type="hidden" name="tgl_baptis" id="tgl_baptis" value="" required/>
                    </div>
                    <div class="form-group">
                        {!! Form::label('dibaptis', 'Dibaptis Oleh') !!}
                        {!! Form::text('dibaptis', $model->dibaptis,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('agama_sebelum', 'Agama Sebelum Dibaptis') !!}
                        {!! Form::text('agama_sebelum', $model->agama_sebelum,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('nama_gkm', 'Nama GKM/Konselor') !!}
                        {!! Form::text('nama_gkm', $model->nama_gkm,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('telp_gkm', 'Telp GKM/Konselor') !!}
                        {!! Form::text('telp_gkm', $model->telp_gkm,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('nama_km', 'Nama KM') !!}
                        {!! Form::text('nama_km', $model->nama_km,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="req_id" value="{{ $model->id }}">
                    <button type="submit" class="btn aqua" >Ya</button>
                    <button type="button" class="btn red" data-dismiss="modal">Tidak</button>
                </div>
                </form>
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
                    {!! Form::open(['route' => 'admin.baptisan.tolak', 'method' => 'post']) !!}
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
<script type="text/javascript" src="{{ url('assets/backend') }}/js/vendor/bootstrap-datetimepicker.js" charset="UTF-8"></script>
@endpush

@push('scripts')
<script>
    $('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
</script>
@endpush
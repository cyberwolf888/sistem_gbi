@extends('layouts.backend')

@push('plugin_css')
<link href="{{ url('assets/backend') }}/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
@endpush

@section('content')
    <div class="wrapper border-bottom page-heading">
        <div class="col-lg-12">
            <h2> Pemberkatan Nikah </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a href="#">Home</a> </li>
                <li class="breadcrumb-item"> <a> Pemberkatan Nikah </a> </li>
                <li class="breadcrumb-item active"> <strong>Create</strong> </li>
            </ol>
        </div>
    </div>
    <div class="wrapper-content ">
        {!! Form::open(['route' => 'member.pemberkatannikah.store', 'method' => 'post', 'files' => true]) !!}
        <div class="row">
            <!-- Basic Form start -->
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="widgets-container">
                        <div class="form-group {{ $errors->has('nama_p') ? ' has-error' : '' }}">
                            {!! Form::label('nama_p', 'Nama Lengkap Pasangan') !!}
                            {!! Form::text('nama_p', $model->nama_p,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                            @if ($errors->has('nama_p'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('nama_p') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('tempat_lahir_p') ? ' has-error' : '' }}">
                            {!! Form::label('tempat_lahir_p', 'Tempat Lahir Pasangan') !!}
                            {!! Form::text('tempat_lahir_p', $model->tempat_lahir_p,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                            @if ($errors->has('tempat_lahir_p'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('tempat_lahir_p') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('tgl_lahir_p') ? ' has-error' : '' }}">
                            {!! Form::label('tgl_lahir_p', 'Tanggal Lahir Pasangan') !!}
                            <div class="input-group date form_date " data-date="" data-date-format="dd MM yyyy" data-link-field="tgl_lahir_p"
                                 data-link-format="yyyy-mm-dd">
                                <input class="form-control" size="16" type="text" value="{{ $model->tgl_lahir_p!='' ? date('d F Y',strtotime($model->tgl_lahir_p)) : '' }}" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                            @if ($errors->has('tgl_lahir_p'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('tgl_lahir_p') }}</strong>
                                    </span>
                            @endif
                            <input type="hidden" name="tgl_lahir_p" id="tgl_lahir_p" value="{{ $model->tgl_lahir_p }}" />
                            <br/>
                        </div>
                        <div class="form-group {{ $errors->has('alamat_p') ? ' has-error' : '' }}">
                            {!! Form::label('alamat_p', 'Alamat Rumah Pasangan') !!}
                            {!! Form::text('alamat_p', $model->alamat_p,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                            @if ($errors->has('alamat_p'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('alamat_p') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('telp_p') ? ' has-error' : '' }}">
                            {!! Form::label('telp_p', 'Telp Pasangan') !!}
                            {!! Form::text('telp_p', $model->telp_p,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                            @if ($errors->has('telp_p'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('telp_p') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('nama_ayah_p') ? ' has-error' : '' }}">
                            {!! Form::label('nama_ayah_p', 'Nama Ayah Pasangan') !!}
                            {!! Form::text('nama_ayah_p', $model->nama_ayah_p,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                            @if ($errors->has('nama_ayah_p'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('nama_ayah_p') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('nama_ibu_p') ? ' has-error' : '' }}">
                            {!! Form::label('nama_ibu_p', 'Nama Ibu Pasangan') !!}
                            {!! Form::text('nama_ibu_p', $model->nama_ibu_p,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                            @if ($errors->has('nama_ibu_p'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('nama_ibu_p') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <button type="submit" class="btn  mb-0 aqua m-t-xs bottom15-xs">Simpan</button>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="widgets-container">
                        <div class="form-group {{ $errors->has('tempat') ? ' has-error' : '' }}">
                            {!! Form::label('tempat', 'Tempat Acara') !!}
                            {!! Form::text('tempat', $model->tempat,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                            @if ($errors->has('tempat'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('tempat') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('tgl_acara') ? ' has-error' : '' }}">
                            {!! Form::label('tgl_acara', 'Tanggal Acara') !!}
                            <div class="input-group date form_date " data-date="" data-date-format="dd MM yyyy" data-link-field="tgl_acara"
                                 data-link-format="yyyy-mm-dd">
                                <input class="form-control" size="16" type="text" value="{{ $model->tgl_acara!='' ? date('d F Y',strtotime($model->tgl_acara)) : '' }}" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                            @if ($errors->has('tgl_acara'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('tgl_acara') }}</strong>
                                    </span>
                            @endif
                            <input type="hidden" name="tgl_acara" id="tgl_acara" value="{{ $model->tgl_acara }}" />
                            <br/>
                        </div>
                        <div class="form-group {{ $errors->has('oleh') ? ' has-error' : '' }}">
                            {!! Form::label('oleh', 'Diselenggarakan Oleh') !!}
                            {!! Form::text('oleh', $model->oleh,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                            @if ($errors->has('oleh'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('oleh') }}</strong>
                                    </span>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </form>
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
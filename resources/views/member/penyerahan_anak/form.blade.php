@extends('layouts.backend')

@push('plugin_css')
<link href="{{ url('assets/backend') }}/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
@endpush

@section('content')
    <div class="wrapper border-bottom page-heading">
        <div class="col-lg-12">
            <h2> Penyerahan Anak </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a href="#">Home</a> </li>
                <li class="breadcrumb-item"> <a> Penyerahan Anak </a> </li>
                <li class="breadcrumb-item active"> <strong>Create</strong> </li>
            </ol>
        </div>
    </div>
    <div class="wrapper-content ">
        {!! Form::open(['route' => 'member.penyerahananak.store', 'method' => 'post', 'files' => true]) !!}
        <div class="row">
            <!-- Basic Form start -->
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="widgets-container">
                        <h5>Form Penyerahan Anak</h5>

                        <hr>

                        <div class="form-group {{ $errors->has('nama_anak') ? ' has-error' : '' }}">
                            {!! Form::label('nama_anak', 'Nama Lengkap Anak') !!}
                            {!! Form::text('nama_anak', $model->nama_anak,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                            @if ($errors->has('nama_anak'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('nama_anak') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('anak_ke') ? ' has-error' : '' }}">
                            {!! Form::label('anak_ke', 'Anak Ke') !!}
                            {!! Form::text('anak_ke', $model->anak_ke,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                            @if ($errors->has('anak_ke'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('anak_ke') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }}">
                            <label>Foto Anak</label><br>
                            <label class="custom-file">
                                <input type="file" id="file" class="custom-file-input" name="img" accept="image/*">
                                <span class="custom-file-control"></span>
                            </label>
                            @if ($errors->has('img'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('satelit') ? ' has-error' : '' }}">
                            {!! Form::label('satelit', 'Satelit') !!}
                            {!! Form::text('satelit', $model->satelit,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                            @if ($errors->has('satelit'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('satelit') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('pendeta') ? ' has-error' : '' }}">
                            {!! Form::label('pendeta', 'Pendeta') !!}
                            {!! Form::text('pendeta', $model->pendeta,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                            @if ($errors->has('pendeta'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('pendeta') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('tgl_penyerahan') ? ' has-error' : '' }}">
                            {!! Form::label('tgl_penyerahan', 'Tanggal Penyerahan') !!}
                            <div class="input-group date form_date " data-date="" data-date-format="dd MM yyyy" data-link-field="tgl_penyerahan"
                                 data-link-format="yyyy-mm-dd">
                                <input class="form-control" size="16" type="text" value="{{ $model->tgl_penyerahan!='' ? date('d F Y',strtotime($model->tgl_penyerahan)) : '' }}" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                            @if ($errors->has('tgl_penyerahan'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('tgl_penyerahan') }}</strong>
                                    </span>
                            @endif
                            <input type="hidden" name="tgl_penyerahan" id="tgl_penyerahan" value="{{ $model->tgl_penyerahan }}" />
                            <br/>
                        </div>

                        <button type="submit" class="btn  mb-0 aqua m-t-xs bottom15-xs">Simpan</button>

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
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
                <li class="breadcrumb-item active"> <strong>Create</strong> </li>
            </ol>
        </div>
    </div>
    <div class="wrapper-content ">
        {!! Form::open(['route' => 'member.baptisan.store', 'method' => 'post', 'files' => true]) !!}
        <div class="row">
            <!-- Basic Form start -->
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="widgets-container">
                        <h5>Form Baptisan</h5>

                        <hr>

                        <div class="form-group {{ $errors->has('nama_ayah') ? ' has-error' : '' }}">
                            {!! Form::label('nama_ayah', 'Nama Lengkap Ayah') !!}
                            {!! Form::text('nama_ayah', $model->nama_ayah,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                            @if ($errors->has('nama_ayah'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('nama_ayah') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('nama_ibu') ? ' has-error' : '' }}">
                            {!! Form::label('nama_ibu', 'Nama Lengkap Ibu') !!}
                            {!! Form::text('nama_ibu', $model->nama_ibu,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                            @if ($errors->has('nama_ibu'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('nama_ibu') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('pekerjaan') ? ' has-error' : '' }}">
                            {!! Form::label('pekerjaan', 'Pekerjaan') !!}
                            {!! Form::text('pekerjaan', $model->anak_ke,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                            @if ($errors->has('pekerjaan'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('pekerjaan') }}</strong>
                                    </span>
                            @endif
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
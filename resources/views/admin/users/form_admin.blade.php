@extends('layouts.backend')

@push('plugin_css')
<link href="{{ url('assets/backend') }}/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
@endpush

@section('content')
    <div class="wrapper border-bottom page-heading">
        <div class="col-lg-12">
            <h2> User Member </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a href="#">Home</a> </li>
                <li class="breadcrumb-item"> <a> Admin </a> </li>
                <li class="breadcrumb-item active"> <strong>Manage</strong> </li>
            </ol>
        </div>
    </div>
    <div class="wrapper-content ">
        {!! Form::open(['route' => isset($update) ? ['admin.users.admin.update', $model->id] :'admin.users.admin.store', 'method' => 'post', 'files' => true]) !!}
        <div class="row">
            <!-- Basic Form start -->
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="widgets-container">
                        <h5>Form Users</h5>

                        <hr>

                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Nama Lengkap') !!}
                            {!! Form::text('name', $model->name,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', 'Alamat Email') !!}
                            {!! Form::text('email', $model->email,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                            {!! Form::label('phone', 'No Telp') !!}
                            {!! Form::text('phone', $model->phone,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                            {!! Form::label('address', 'Alamat') !!}
                            {!! Form::text('address', $model->address,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                            @if ($errors->has('address'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('tempat_lahir') ? ' has-error' : '' }}">
                            {!! Form::label('tempat_lahir', 'Tempat Lahir') !!}
                            {!! Form::text('tempat_lahir', $model->tempat_lahir,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                            @if ($errors->has('tempat_lahir'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
                            {!! Form::label('tgl_lahir', 'Tanggal Lahir') !!}
                            <div class="input-group date form_date " data-date="" data-date-format="dd MM yyyy" data-link-field="tgl_lahir"
                                 data-link-format="yyyy-mm-dd">
                                <input class="form-control" size="16" type="text" value="{{ $model->tgl_lahir!='' ? date('d F Y',strtotime($model->tgl_lahir)) : '' }}" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                            @if ($errors->has('tgl_lahir'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                    </span>
                            @endif
                            <input type="hidden" name="tgl_lahir" id="tgl_lahir" value="{{ $model->tgl_lahir }}" />
                            <br/>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', 'Password') !!}
                            {!! Form::password('password', ['class'=>'form-control m-t-xxs']) !!}
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            {!! Form::label('password_confirmation', 'Password Confirmation') !!}
                            {!! Form::password('password_confirmation', ['class'=>'form-control m-t-xxs']) !!}
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }}">
                            <label>Foto Admin</label><br>
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
                        <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                            {!! Form::label('status', 'Status') !!}
                            {!! Form::select('status', ['1'=>'Aktif','0'=>'Tidak Aktif'], $model->status,['class'=>'form-control m-t-xxs']) !!}
                            @if ($errors->has('status'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
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
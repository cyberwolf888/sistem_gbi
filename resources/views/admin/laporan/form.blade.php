@extends('layouts.backend')

@push('plugin_css')
    <link href="{{ url('assets/backend') }}/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
@endpush

@section('content')
    <div class="wrapper border-bottom page-heading">
        <div class="col-lg-12">
            <h2> Laporan </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a href="#">Home</a> </li>
                <li class="breadcrumb-item active"> <strong>Laporan</strong> </li>
            </ol>
        </div>
    </div>
    <div class="wrapper-content ">
        {!! Form::open(['route' => 'admin.laporan.result', 'method' => 'post', 'files' => true]) !!}
        <div class="row">
            <!-- Basic Form start -->
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="widgets-container">
                        <h5>Laporan</h5>

                        <hr>

                        <div class="form-group">
                            {!! Form::label('jenis_laporan', 'Jenis Laporan') !!}
                            {!! Form::select('jenis_laporan', [1=>'Penyerahan Anak',2=>'Baptisan',3=>'Pemberkatan Nikah'],null,['class'=>'form-control m-t-xxs','required'=>'']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('tgl_awal', 'Tanggal Awal') !!}
                            <div class="input-group date form_date " data-date="" data-date-format="dd MM yyyy" data-link-field="tgl_awal"
                                 data-link-format="yyyy-mm-dd">
                                <input class="form-control" size="16" type="text" value="" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                            <input type="hidden" name="tgl_awal" id="tgl_awal" value="" />
                            <br/>
                        </div>

                        <div class="form-group">
                            {!! Form::label('tgl_akhir', 'Tanggal Akhir') !!}
                            <div class="input-group date form_date " data-date="" data-date-format="dd MM yyyy" data-link-field="tgl_akhir"
                                 data-link-format="yyyy-mm-dd">
                                <input class="form-control" size="16" type="text" value="" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                            <input type="hidden" name="tgl_akhir" id="tgl_akhir" value="" />
                            <br/>
                        </div>

                        <button type="submit" class="btn  mb-0 aqua m-t-xs bottom15-xs">Cari Laporan</button>

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
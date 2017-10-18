@extends('layouts.backend')

@section('content')
    <div class="wrapper border-bottom page-heading">
        <div class="col-lg-12">
            <h2> Dashboard </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a href="#">Home</a> </li>
                <li class="breadcrumb-item active"> <strong>Dashboard</strong> </li>
            </ol>
        </div>
    </div>
    <div class="wrapper-content ">
        <div class="row">
            <!-- begin col-3 -->
            <div class="col-md-3 col-sm-6">
                <div class="widget widget-stats mt-0 red-bg">
                    <div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
                    <div class="stats-title">PENYERAHAN ANAK</div>
                    <div class="stats-number">{{ \App\Models\PenyerahanAnak::where('user_id',Auth::user()->id)->count() }}</div>
                    <div class="stats-progress progress">
                        <div style="width: 70.1%;" class="progress-bar"></div>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-md-3 col-sm-6 mtop15">
                <div class="widget widget-stats mt-0 aqua-bg ">
                    <div class="stats-icon stats-icon-lg"><i class="fa fa-tags fa-fw"></i></div>
                    <div class="stats-title">BAPTISAN</div>
                    <div class="stats-number">{{ \App\Models\Baptisan::where('user_id',Auth::user()->id)->count() }}</div>
                    <div class="stats-progress progress">
                        <div style="width: 40.5%;" class="progress-bar"></div>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-md-3 col-sm-6 mtop15">
                <div class="widget widget-stats mt-0 green-bg">
                    <div class="stats-icon stats-icon-lg"><i class="fa fa-shopping-cart fa-fw"></i></div>
                    <div class="stats-title">PEMBERKATAN NIKAH</div>
                    <div class="stats-number">{{ \App\Models\PemberkatanNikah::where('user_id',Auth::user()->id)->count() }}</div>
                    <div class="stats-progress progress">
                        <div style="width: 76.3%;" class="progress-bar"></div>
                    </div>
                </div>
            </div>
            <!-- end col-3 -->
        </div>
        <div class="border-bottom white-bg dashboard-header">
            <div class="row">
                <div class="col-md-12">
                    <div class="demo-container statistic-box">
                        <div class="row">
                            <div class="col-md-1">
                                <span style="background-color: rgba(0,188,212,0.9);width: 20px;height: 20px;display: block;"></span>Penyerahan Anak
                            </div>
                            <div class="col-md-1">
                                <span style="background-color: rgba(245,156,26,0.9);width: 20px;height: 20px;display: block;"></span>Baptisan
                            </div>
                            <div class="col-md-1">
                                <span style="background-color: rgba(255,117,136,0.9);width: 20px;height: 20px;display: block;"></span>Pemberkatan Nikah
                            </div>
                        </div>
                        <div>
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('plugin_scripts')
<!--  chartJs js  -->
<script src="{{ url('assets/backend') }}/js/vendor/chartJs/Chart.bundle.js"></script>
@endpush

@push('scripts')
<script>
    var lineData = {
        labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember"],
        datasets: [
            {
                label: "Penyerahan Anak",
                fillColor: "rgba(0,188,212,0.9)",
                strokeColor: "rgba(0,188,212,1)",
                pointColor: "rgba(0,188,212,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: <?= $penyerahan_anak ?>
            },
            {
                label: "Baptisan",
                fillColor: "rgba(245,156,26,0.9)",
                strokeColor: "rgba(245, 156, 26,1)",
                pointColor: "rgba(245, 156, 26,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(245, 156, 26,1)",
                data: <?= $baptisan ?>
            },
            {
                label: "Pemberkatan Nikah",
                fillColor: "rgba(255,117,136,0.9)",
                strokeColor: "rgba(255,117,136,0.7)",
                pointColor: "rgba(255,117,136,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(26,179,148,1)",
                data: <?= $pemberkatan_nikah ?>

            }
        ]
    };

    var lineOptions = {
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        bezierCurve: true,
        bezierCurveTension: 0.4,
        pointDot: true,
        pointDotRadius: 4,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    };


    var ctx = document.getElementById("lineChart").getContext("2d");
    var myNewChart = new Chart(ctx).Line(lineData, lineOptions);
</script>
@endpush
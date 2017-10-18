@extends('layouts.backend')

@push('plugin_css')
<!-- dataTables -->
<link href="{{ url('assets/backend') }}/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="{{ url('assets/backend') }}/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="{{ url('assets/backend') }}/css/responsive.dataTables.min.css" rel="stylesheet">
<link href="{{ url('assets/backend') }}/css/fixedHeader.dataTables.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="wrapper border-bottom page-heading">
        <div class="col-lg-12">
            <h2> User Admin </h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a href="#">Home</a> </li>
                <li class="breadcrumb-item"> <a> Admin </a> </li>
                <li class="breadcrumb-item active"> <strong>Manage</strong> </li>
            </ol>
        </div>
    </div>
    <div class="wrapper-content ">
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <a class="btn aqua" href="{{ route('admin.users.admin.create') }}"><i class="fa fa-plus"></i> Add New Data</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Data Admin</h5>
                    </div>
                    <div class="ibox-content collapse show">
                        <div class="widgets-container">

                            <div class="row">
                                <div class="col-lg-12" >
                                    <table id="example7" class="display nowrap table  responsive nowrap table-bordered">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php $no = 1; ?>
                                        @foreach($model as $row)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->phone }}</td>
                                                <td>{{ $row->getStatus() }}</td>
                                                <td>
                                                    <!-- <a href="{{ route('admin.users.admin.show',$row->id) }}" class="btn aqua  btn-xs">detail</a> -->
                                                    <a href="{{ route('admin.users.admin.edit',$row->id) }}" class="btn yellow  btn-xs">edit</a>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                        @endforeach
                                        </tbody>
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
<!-- dataTables-->
<script src="{{ url('assets/backend') }}/js/vendor/tether.min.js"></script>
<script src="{{ url('assets/backend') }}/js/vendor/bootstrap.min.js"></script>
<script type="text/javascript" src="{{ url('assets/backend') }}/js/vendor/jquery.dataTables.js"></script>
<script type="text/javascript" src="{{ url('assets/backend') }}/js/vendor/dataTables.bootstrap4.min.js"></script>

<!-- js for print and download -->
<script type="text/javascript" src="{{ url('assets/backend') }}/js/vendor/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="{{ url('assets/backend') }}/js/vendor/buttons.flash.min.js"></script>
<script type="text/javascript" src="{{ url('assets/backend') }}/js/vendor/jszip.min.js"></script>
<script type="text/javascript" src="{{ url('assets/backend') }}/js/vendor/pdfmake.min.js"></script>
<script type="text/javascript" src="{{ url('assets/backend') }}/js/vendor/vfs_fonts.js"></script>
<script type="text/javascript" src="{{ url('assets/backend') }}/js/vendor/buttons.html5.min.js"></script>
<script type="text/javascript" src="{{ url('assets/backend') }}/js/vendor/buttons.print.min.js"></script>
<script type="text/javascript" src="{{ url('assets/backend') }}/js/vendor/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="{{ url('assets/backend') }}/js/vendor/dataTables.fixedHeader.min.js"></script>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        $('#example7').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                text: 'excel',
                extend: "excel",
                className: 'btn aqua btn-outline'
            }, {
                text: 'pdf',
                extend: "pdf",
                className: 'btn yellow  btn-outline'
            }, {
                text: 'print',
                extend: "print",
                className: 'btn purple  btn-outline'
            }]
        });
    });
</script>
@endpush
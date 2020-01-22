@extends('layouts.master')

@section('title')
    Department List
@endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"/>


    <link href="{{ asset('plugins/jquery-toast/jquery.toast.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Pace reload page !-->
    <link href="{{ asset('plugins/pace/pace-theme-minimal.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('breadcrumb')
    <div class="col-sm-6">
        <h4 class="page-title">Department List</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Data Management</a></li>
            {{--            <li class="breadcrumb-item"><a href="javascript:void(0);">Departments</a></li>--}}
            <li class="breadcrumb-item active">Department</li>
        </ol>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <button type="button" name="create_record" id="create_record" class="btn btn-primary waves-effect"
                    data-toggle="modal" data-target="#createModalForm">Add New
            </button>

            <br>
            <div class="card">
                <div class="card-body">

                    {{--                    <h4 class="mt-0 header-title">Buttons example</h4>--}}

                    <table id="datatable_department" class="table table-striped table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Name Khmer</th>
                            <th>ABR</th>
                            <th>ABR KH</th>
                            <th>Bed</th>
                            <th>Description</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <!-- sample modal content -->
    <div id="createModalForm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Add new: Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form method="post" id="department_form">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="name" id="name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name_kh" class="col-sm-3 col-form-label">Name in Khmer</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="name_kh" id="name_kh" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ABR" class="col-sm-3 col-form-label">Abbreviation</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="abr" id="abr">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="abr_kh" class="col-sm-3 col-form-label">Abbreviation Khmer</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="abr_kh" id="abr_kh">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bed" class="col-sm-3 col-form-label">Bed</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="number" name="bed" id="bed">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="active" class="col-sm-3 col-form-label">Active</label>
                            <div class="col-sm-9">
                                <input type="checkbox" id="active" name="active" switch="success" checked/>
                                <label for="active" data-on-label="Yes" data-off-label="No"></label>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>

                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div>




@endsection

@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ URL::asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ URL::asset('plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('assets/pages/datatables.init.js') }}"></script>

    <script src="{{ asset('plugins/jquery-toast/jquery.toast.min.js') }}"></script>


    <script>
        $(document).ready(function () {

            $('#datatable_department').DataTable({
                processing: true,
                serverSide: true,
                paging: 100,
                searching: true,
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ],
                ajax: {
                    url: "{{route('departments.index')}}",
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'name_kh', name: 'name_kh'},
                    {data: 'abr', name: 'abr'},
                    {data: 'abr_kh', name: 'abr_kh'},
                    {data: 'bed', name: 'bed'},
                    {data: 'description', name: 'description'},
                    {data: 'active', name: 'active'},
                    {data: 'action', name: 'action', orderable: false}
                ]
            });


            $('#department_form').on('submit',function (event) {
                event.preventDefault();
                var action_url="{{route('departments.store')}}";
                $.ajax({
                    url:action_url,
                    method:"POST",
                    data:$(this).serialize(),
                    dataType:"json",
                    success:function (data) {
                        var html='';
                        if(data.errors)
                        {
                            html='<div class="alert alert-danger">';
                            for(var count=0; count <data.errors.length; count++)
                            {
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            html +='</div>';
                        }

                        if(data.success)
                        {
                            html='<div class="alert alert-success">' + data.success + '</div>';
                            $('#datatable_department').DataTable().ajax.reload();
                        }
                        $('#createModalForm').modal('hide');
                        $.toast({
                            heading: 'Successful',
                            text: data.success,
                            icon: 'success',
                            loader: true,        // Change it to false to disable loader
                            loaderBg: '#9EC600',  // To change the background
                            position:'top-right'
                        });

                    }
                });
            });


            
        });


    </script>

@endsection
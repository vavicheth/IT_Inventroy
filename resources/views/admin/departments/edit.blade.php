@extends('layouts.master')

@section('title')
    Department Edit
@endsection

@section('css')

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
            <div class="card">
                <div class="card-body">

                    {!! Form::open(['route' => ['departments.update', $department->id],'method'=>'PATCH']) !!}
                        @csrf
                        <input type="_method" value="PACTH" hidden>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="name" id="name" value="{{$department->name}}"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name_kh" class="col-sm-2 col-form-label">Name in Khmer</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="name_kh" id="name_kh" value="{{$department->name_kh}}"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ABR" class="col-sm-2 col-form-label">Abbreviation</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="abr" id="abr" value="{{$department->abr}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="abr_kh" class="col-sm-2 col-form-label">Abbreviation Khmer</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="abr_kh" id="abr_kh" value="{{$department->abr_kh}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bed" class="col-sm-2 col-form-label">Bed</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="bed" id="bed" value="{{$department->bed}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="active" class="col-sm-2 col-form-label">Active</label>
                            <div class="col-sm-10">
                                <input type="checkbox" id="active" name="active" switch="success" {{$department->active =='1'? 'checked':''}} />
                                <label for="active" data-on-label="" data-off-label=""></label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" id="description" >{{$department->description}}</textarea>
                            </div>
                        </div>


                        <div class="form-group float-right">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Update
                                </button>
                                <a href="{{ URL::previous() }}" class="btn btn-secondary waves-effect m-l-5">
                                    Cancel
                                </a>
                            </div>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


@endsection



@section('script')

@endsection


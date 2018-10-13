@extends('theme.default')


@section('content')
    <style>
        #loader{
            visibility:hidden;
        }
    </style>

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage Annual Work Plans</h3>
                </div>


            </div>

            <!--<div class="clearfix"></div>-->
            <div id="loader" class="clearfix"><i class="fa fa-spinner fa-3x fa-spin"></i></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Upload Work Plan</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">

                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('annualworkplans.edit',$annualworkplan->id) }}"> Back</a>
                                    </div>
                                </div>
                            </div>


                            @if ( Session::has('success') )
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <strong>{{ Session::get('success') }}</strong>
                                </div>
                            @endif

                            @if ( Session::has('error') )
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                    <strong>{{ Session::get('error') }}</strong>
                                </div>
                            @endif


                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            {!! Form::open(array('route' => 'annualworkplans.import','method'=>'POST','enctype'=>'multipart/form-data')) !!}
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Department:</strong>

                                        <select name="department_id" id="department_id" class="form-control" readonly="readonly">
                                            <option value="">Select Department</option>
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}" @if ($department->id==$annualworkplan->department_id) selected="selected" @endif >{{$department->department_name}}</option>

                                            @endforeach
                                        </select>

                                        <input type="hidden" name="annualworkplan_id" id="annualworkplan_id" value="{{ $annualworkplan->id }}">

                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Division:</strong>

                                        <select name="division_id" id="division_id" class="form-control" readonly="readonly">
                                            <option value="">Select Division</option>
                                            @foreach($divisions as $division)
                                                <option value="{{$division->id}}" @if ($division->id==$annualworkplan->division_id) selected="selected" @endif >{{$division->division_name}}</option>

                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Unit:</strong>

                                        <select name="unit_id" id="unit_id" class="form-control" readonly="readonly">
                                            <option value="">Select Unit</option>
                                            @foreach($units as $unit)
                                                <option value="{{$unit->id}}" @if ($unit->id==$annualworkplan->unit_id) selected="selected" @endif >{{$unit->unit_name}}</option>

                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Work Plan Period:</strong>

                                        <select name="rollingplan_id" id="rollingplan_id" class="form-control" readonly="readonly">
                                            <option value="">Select Work Plan Period</option>
                                            @foreach($rollingplans as $rollingplan)
                                                <option value="{{$rollingplan->id}}" @if ($rollingplan->id==$annualworkplan->rollingplan_id) selected="selected" @endif >{{$rollingplan->start_year}} - {{$rollingplan->end_year}}</option>

                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                        <strong>Result Area:</strong>
                                        <select name="resultarea_id" id="resultarea_id" class="form-control">

                                            @foreach($resultareas as $resultarea)
                                                <option value="{{$resultarea->id}}" >{{$resultarea->result_area}}</option>

                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                        <strong>Upload Activities:</strong>
                                        <a href="{{ URL::to('files/import.xlsx') }}" class="green" target="_blank"> <i class="fa fa-file-excel-o"></i> Download Excel Template</a>
                                       <input type="file" name="file" id="file" class="form-control">

                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>

                                </div>


                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->

@endsection
@extends('theme.default')


@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Activity Indicator Report</h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Generate Report</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

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


                            {!! Form::open(array('route' => 'reports.indicatorreport','method'=>'POST')) !!}
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Department:</strong>

                                        <select name="department_id" id="department_id" class="form-control">
                                            <option value="">Select Department</option>
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}">{{$department->department_name}}</option>

                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Division:</strong>

                                        <select name="division_id" id="division_id" class="form-control">
                                            <option>Select Division</option>


                                        </select>

                                    </div>

                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Unit:</strong>


                                        <select name="unit_id" id="unit_id" class="form-control">
                                            <option value="">Select Unit</option>

                                        </select>

                                    </div>

                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Work Plan Period:</strong>

                                        <select name="rollingplan_id" id="rollingplan_id" class="form-control">
                                            <option value="">Select Work Plan Period</option>
                                            @foreach($rollingplans as $rollingplan)
                                                <option value="{{$rollingplan->id}}">{{$rollingplan->start_year}} - {{$rollingplan->end_year}}</option>

                                            @endforeach
                                        </select>
                                    </div>


                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                                    <button type="submit" class="btn btn-primary">GENERATE REPORT</button>
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

    <script src="{!! asset('theme/js/jquery.min.js') !!}"></script>

    <script type="application/javascript">
        $(document).ready(function() {

            $('select[name="department_id"]').on('change', function(){
                var department_id = $(this).val();
                var route = '{{ route("annualworkplans.getdivisions", ":department_id") }}';
                route = route.replace(':department_id', department_id);
                if(department_id) {
                    $.ajax({
                        //url: 'getdivisions/'+department_id,
                        url: route,
                        type:"GET",
                        dataType:"json",
                        beforeSend: function(){
                            $('#loader').css("visibility", "visible");
                        },

                        success:function(data) {

                            $('select[name="division_id"]').empty();
                            $('select[name="division_id"]').append('<option value="">Select Division</option>');

                            $.each(data, function(key, value){

                                $('select[name="division_id"]').append('<option value="'+ key +'">' + value + '</option>');

                            });
                        },
                        complete: function(){
                            $('#loader').css("visibility", "hidden");
                        }
                    });
                } else {
                    $('select[name="division_id"]').empty();

                    $('select[name="division_id"]').append('<option value="">Select Division</option>');
                }

            });

        });


    </script>

    <script type="application/javascript">
        $(document).ready(function() {

            $('select[name="division_id"]').on('change', function(){
                var division_id = $(this).val();
                var route = '{{ route("annualworkplans.getunits", ":division_id") }}';
                route = route.replace(':division_id', division_id);
                if(department_id) {
                    $.ajax({
                        url: route,
                        type:"GET",
                        dataType:"json",
                        beforeSend: function(){
                            $('#loader').css("visibility", "visible");
                        },

                        success:function(data) {

                            $('select[name="unit_id"]').empty();
                            $('select[name="unit_id"]').append('<option value="">Select Unit</option>');

                            $.each(data, function(key, value){

                                $('select[name="unit_id"]').append('<option value="'+ key +'">' + value + '</option>');

                            });
                        },
                        complete: function(){
                            $('#loader').css("visibility", "hidden");
                        }
                    });
                } else {
                    $('select[name="unit_id"]').empty();
                    $('select[name="unit_id"]').append('<option value="">Select Unit</option>');

                }

            });

        });


    </script>

@endsection
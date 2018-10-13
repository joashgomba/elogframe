@extends('theme.default')


@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Overall MES Indicator Report</h3>
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


                            {!! Form::open(array('route' => 'reports.overall','method'=>'POST')) !!}
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>County:</strong>

                                        <select name="county_id" id="county_id" class="form-control">
                                            <option value="">Select County</option>
                                            @foreach($counties as $county)
                                                <option value="{{$county->id}}">{{$county->county}}</option>

                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Financial Year:</strong>

                                        <select name="rollingplan_id" id="rollingplan_id" class="form-control">
                                            <option value="">Select Financial Year</option>
                                            @foreach($rollingplans as $rollingplan)
                                                <option value="{{$rollingplan->id}}">{{$rollingplan->start_year}} - {{$rollingplan->end_year}}</option>

                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Quarter:</strong>

                                        <select name="quarter" class="form-control">
                                            <option value="1">Q1</option>
                                            <option value="2">Q2</option>
                                            <option value="3">Q3</option>
                                            <option value="4">Q4</option>
                                        </select>

                                    </div>

                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Indicator Category:</strong>

                                        <select name="indicatorcategory_id" id="indicatorcategory_id" class="form-control" required="required">
                                            <option value="">Select Category</option>
                                            @foreach($indicatorcategories as $indicatorcategory)
                                                <option value="{{$indicatorcategory->id}}">{{$indicatorcategory->category}}</option>

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



@endsection
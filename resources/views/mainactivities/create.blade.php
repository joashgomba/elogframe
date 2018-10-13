@extends('theme.default')


@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage Ministries</h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Create Ministry</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">

                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
                                    </div>
                                </div>
                            </div>


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


                            {!! Form::open(array('route' => 'mainactivities.store','method'=>'POST')) !!}
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <strong>Result Area:</strong>
                                    <select name="resultarea_id" id="resultarea_id" class="form-control">

                                        @foreach($resultareas as $resultarea)
                                            <option value="{{$resultarea->id}}" >{{$resultarea->result_area}}</option>

                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <strong>Main Activity:</strong>
                                    <input type="text" name="activity_name" id="activity_name" placeholder="Main Activity" class="form-control">
                                    <input type="hidden" name="annualworkplan_id" id="annualworkplan_id" value="1">
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <strong>Output:</strong>
                                    <input type="text" name="output" id="output" placeholder="Output" class="form-control">
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <strong>Performance Indicator (s):</strong>
                                    <input type="text" name="indicator" id="indicator" placeholder="Performance Indicator" class="form-control">
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <strong>Target:</strong>
                                    <input type="text" name="target_output" id="target_output" placeholder="Target" class="form-control">
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <strong>Means of Verification:</strong>
                                    <input type="text" name="means_of_verification" id="means_of_verification" placeholder="Means of verification" class="form-control">
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <strong>2018/2019</strong>
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-3 form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="quarter_one" id="quarter_one"> Q1
                                        </label>
                                    </div>

                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="quarter_two" id="quarter_two"> Q2
                                        </label>
                                    </div>

                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="quarter_three" id="quarter_three" > Q3
                                        </label>
                                    </div>

                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="quarter_four" id="quarter_four"> Q4
                                        </label>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <strong>Cost Requirements (Ksh):</strong>

                                    <input type="text" name="cost_requirements" id="cost_requirements" placeholder="Cost Requirements" class="form-control">

                                </div>
                                <div class="form-group">
                                    <strong>On budget funds</strong>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <strong>Amount (Ksh):</strong>
                                    <input type="text" name="on_budget_amount" id="on_budget_amount" placeholder="Amount" class="form-control">
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <strong>Sources of funding:</strong>
                                    <select name="source_of_funding[]" class="form-control" multiple>
                                        @foreach($sourcesoffunding as $sourceoffunding)
                                            <option value="{{$sourceoffunding->id}}" >{{$sourceoffunding->fund_name}}</option>

                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <strong>Off budget funds</strong>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <strong>Amount (Ksh):</strong>
                                    <input type="text" name="off_budget_amount" id="off_budget_amount" placeholder="Amount" class="form-control">
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                    <strong>Sources of funding:</strong>
                                    <select name="off_source_of_funding[]" class="form-control" multiple>
                                        @foreach($sourcesoffunding as $sourceoffunding)
                                            <option value="{{$sourceoffunding->id}}" >{{$sourceoffunding->fund_name}}</option>

                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <strong>Funding Gap:</strong>

                                    <input type="text" name="funding_gap" id="funding_gap" placeholder="Funding Gap" class="form-control">

                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
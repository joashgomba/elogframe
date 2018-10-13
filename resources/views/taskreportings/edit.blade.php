@extends('theme.default')


@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage Annual Work Plans</h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Annual Work Plan</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">

                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('annualworkplans.index') }}"> Back</a>
                                    </div>
                                </div>
                            </div>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    {{ $message }}
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



                            <form action="{{ route('annualworkplans.update',$annualworkplan->id) }}" id="frm" name="frm" method="POST">
                                @csrf
                                @method('PUT')



                                <div class="row">

                                   <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2><i class="fa fa-bars"></i> Work Plan Details</h2>

                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">


                                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">General</a>
                                                        </li>
                                                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Activities</a>
                                                        </li>

                                                    </ul>
                                                    <div id="myTabContent" class="tab-content">
                                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                                            <div class="form-group">
                                                                <strong>Department:</strong>

                                                                <select name="department_id" id="department_id" class="form-control">
                                                                    <option value="">Select Department</option>
                                                                    @foreach($departments as $department)
                                                                        <option value="{{$department->id}}" @if ($department->id==$annualworkplan->department_id) selected="selected" @endif >{{$department->department_name}}</option>

                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <strong>Division:</strong>

                                                                <select name="division_id" id="division_id" class="form-control">
                                                                    <option value="">Select Division</option>
                                                                    @foreach($divisions as $division)
                                                                        <option value="{{$division->id}}" @if ($division->id==$annualworkplan->division_id) selected="selected" @endif >{{$division->division_name}}</option>

                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <strong>Unit:</strong>

                                                                <select name="unit_id" id="unit_id" class="form-control">
                                                                    <option value="">Select Unit</option>
                                                                    @foreach($units as $unit)
                                                                        <option value="{{$unit->id}}" @if ($unit->id==$annualworkplan->unit_id) selected="selected" @endif >{{$unit->unit_name}}</option>

                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <strong>Work Plan Period:</strong>

                                                                <select name="rollingplan_id" id="rollingplan_id" class="form-control">
                                                                    <option value="">Select Work Plan Period</option>
                                                                    @foreach($rollingplans as $rollingplan)
                                                                        <option value="{{$rollingplan->id}}" @if ($rollingplan->id==$annualworkplan->rollingplan_id) selected="selected" @endif >{{$rollingplan->start_year}} - {{$rollingplan->end_year}}</option>

                                                                    @endforeach
                                                                </select>

                                                            </div>


                                                        </div>
                                                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

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
                                                                <input type="hidden" name="annualworkplan_id" id="annualworkplan_id" value="{{$annualworkplan->id}}">
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
                                                                <strong>{{$annualworkplan->rollingplan->start_year}} - {{$annualworkplan->rollingplan->end_year}}</strong>
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
                                                                <div class="pull-left">

                                                                    <a href="JavaScript:Void(0);" class="btn btn-success">Add Activity</a>
                                                                </div>
                                                            </div>

                                                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">


                                                                <table class="table table-striped jambo_table">
                                                                <thead>
                                                                <tr>
                                                                    <th colspan="8">&nbsp;</th>
                                                                    <th colspan="2">On budget funds</th>
                                                                    <th colspan="2">Off budget funds</th>
                                                                    <th>&nbsp;</th>
                                                                </tr>


                                                                <tr>

                                                                    <th>Result Area</th>
                                                                    <th>Main Activities</th>
                                                                    <th>Outputs</th>
                                                                    <th>Performance Indicator(s)</th>
                                                                    <th>Target Output</th>
                                                                    <th>Means of verification</th>
                                                                    <th>{{ $annualworkplan->rollingplan->start_year }} - {{ $annualworkplan->rollingplan->end_year }} Quarter</th>
                                                                    <th>Cost</th>
                                                                    <th>Amount (Ksh)</th>
                                                                    <th>Source of funding</th>
                                                                    <th>Amount (Ksh)</th>
                                                                    <th>Source of funding</th>
                                                                    <th>Gap (Ksh)</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>Policy Making and Strategic Planning</td>
                                                                    <td>Finalize the KHSSP 2018/2023</td>
                                                                    <td>KHSSP 2018/2023</td>
                                                                    <td>Approved KHSSP</td>
                                                                    <td>1</td>
                                                                    <td>Document</td>
                                                                    <td>Q1,Q2</td>
                                                                    <td>37936600</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>37936600</td>
                                                                    <td>WHO, UNICEF, UNFPA</td>
                                                                    <td>-</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Policy Making and Strategic Planning</td>
                                                                    <td>Printing, launch and dissemination of approved KHSSP</td>
                                                                    <td>KHSSP 2018/2023</td>
                                                                    <td>Printed KHSSP</td>
                                                                    <td>500</td>
                                                                    <td>Lunch Report</td>
                                                                    <td>Q1,Q2,<br>Q3,Q4</td>
                                                                    <td>37936600</td>
                                                                    <td>-</td>
                                                                    <td>-</td>
                                                                    <td>37936600</td>
                                                                    <td>WHO, UNICEF, UNFPA</td>
                                                                    <td>-</td>
                                                                </tr>

                                                                </tbody>

                                                            </table>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Update Work Plan</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->


@endsection
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
                            <h2>Edit Work Plan</h2>

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



                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Department:</strong>

                                        <select name="department_id" id="department_id" class="form-control">
                                            <option value="">Select Department</option>
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}" @if ($department->id==$annualworkplan->department_id) selected="selected" @endif >{{$department->department_name}}</option>

                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Division:</strong>

                                        <select name="division_id" id="division_id" class="form-control">
                                            <option value="">Select Division</option>
                                            @foreach($divisions as $division)
                                                <option value="{{$division->id}}" @if ($division->id==$annualworkplan->division_id) selected="selected" @endif >{{$division->division_name}}</option>

                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Unit:</strong>

                                        <select name="unit_id" id="unit_id" class="form-control">
                                            <option value="">Select Unit</option>
                                            @foreach($units as $unit)
                                                <option value="{{$unit->id}}" @if ($unit->id==$annualworkplan->unit_id) selected="selected" @endif >{{$unit->unit_name}}</option>

                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Work Plan Period:</strong>

                                        <select name="rollingplan_id" id="rollingplan_id" class="form-control">
                                            <option value="">Select Work Plan Period</option>
                                            @foreach($rollingplans as $rollingplan)
                                                <option value="{{$rollingplan->id}}" @if ($rollingplan->id==$annualworkplan->rollingplan_id) selected="selected" @endif >{{$rollingplan->start_year}} - {{$rollingplan->end_year}}</option>

                                            @endforeach
                                        </select>

                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <a href="{{ URL::to('files/import.xlsx') }}" target="_blank" class="btn btn-primary"><i class="fa fa-download"></i> Download Excel Template</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('annualworkplans.upload',$annualworkplan->id) }}" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Upload From Excel</a>
                                        <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal"><i class="fa fa-plus"></i> Add New Activity</button>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Records:</h4>
                                    <div class="table-responsive">

                                    <div id='response'>

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

                                            @foreach($mainactivities as $mainactivity)
                                                <tr>
                                                    <td>{{$mainactivity->resultarea->result_area}}</td>
                                                    <td>{{$mainactivity->activity_name}}</td>
                                                    <td>
                                                        @foreach($mainactivity->expectedoutputs as $output)
                                                            {{$output->output}}
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($mainactivity->performanceindicators as $performanceindicator)
                                                            {{$performanceindicator->indicator}}
                                                        @endforeach
                                                    </td>
                                                    <td>@foreach($mainactivity->performanceindicators as $performanceindicator)
                                                            {{$performanceindicator->target_output}}
                                                        @endforeach</td>
                                                    <td>@foreach($mainactivity->performanceindicators as $performanceindicator)
                                                            {{$performanceindicator->means_of_verification}}
                                                        @endforeach</td>
                                                    <td>
                                                        @if($mainactivity->quarter_one==1)
                                                            Q1
                                                        @endif

                                                        @if(@$mainactivity->quarter_two==1)
                                                            Q2
                                                        @endif

                                                        @if($mainactivity->quarter_three==1)
                                                            Q3
                                                        @endif
                                                        @if($mainactivity->quarter_four==1)
                                                            Q4
                                                        @endif

                                                    </td>
                                                    <td>{{$mainactivity->cost_requirements}}</td>
                                                    <td>{{$mainactivity->on_budget_amount}}</td>
                                                    <td>@foreach($mainactivity->sourcesoffunding as $sourcesoffunding)
                                                            {{$sourcesoffunding->fund_name}}
                                                        @endforeach</td>
                                                    <td>{{$mainactivity->off_budget_amount}}</td>
                                                    <td>@foreach($mainactivity->sourcesoffunding as $sourcesoffunding)
                                                            {{$sourcesoffunding->fund_name}}
                                                        @endforeach</td>
                                                    <td>{{$mainactivity->finding_gap}}</td>
                                                </tr>

                                            @endforeach



                                            </tbody>

                                        </table>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form id='myForm'>
                        <div class="modal fade bs-example-modal-lg" id="add_new_record_modal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Add New Activity</h4>
                                    </div>
                                    <div class="modal-body">

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
                                                    <input type="hidden" name="quarter_one" value="0">
                                                    <input type="checkbox" name="quarter_one" id="quarter_one" value="1"> Q1
                                                </label>
                                            </div>

                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-3 form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="hidden" name="quarter_two" value="0">
                                                    <input type="checkbox" name="quarter_two" id="quarter_two" value="1"> Q2
                                                </label>
                                            </div>

                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-3 form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="hidden" name="quarter_three" value="0">
                                                    <input type="checkbox" name="quarter_three" id="quarter_three" value="1"> Q3
                                                </label>
                                            </div>

                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-3 form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="hidden" name="quarter_four" value="0">
                                                    <input type="checkbox" name="quarter_four" id="quarter_four" value="1"> Q4
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
                                                @foreach($fundingsources as $fundingsource)
                                                    <option value="{{$fundingsource->id}}" >{{$fundingsource->fund_name}}</option>

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
                                                @foreach($fundingsources as $fundingsource)
                                                    <option value="{{$fundingsource->id}}" >{{$fundingsource->fund_name}}</option>

                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <strong>Funding Gap:</strong>

                                            <input type="text" name="finding_gap" id="finding_gap" placeholder="Funding Gap" class="form-control">

                                        </div>




                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" onclick="addRecord()">Add Record</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                        </form>






                            <script src="{!! asset('theme/js/jquery.min.js') !!}"></script>
                            <script>
                                $(document).ready(function(){
                                    $('#myForm').submit(function(){

                                        $('#response').html("<b>Loading response...</b>");


                                        $.ajax({
                                            type: 'POST',
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                            },
                                            url: '{{url("mainactivities/ajaxstore")}}',
                                            data: $(this).serialize() // getting filed value in serialize form
                                        })
                                            .done(function(data){ // if getting done then call.

                                                $('#name').val("");
                                                $('#email').val("");
                                                $('#number').val("");
                                                $('#response').html(data);
                                                $('#add_new_record_modal').modal('toggle');


                                            })
                                            .fail(function() { // if fail then getting message

                                                alert( "Posting failed." );

                                            });


                                        return false;

                                    });
                                });
                            </script>





                               <!-- <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>-->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->



@endsection
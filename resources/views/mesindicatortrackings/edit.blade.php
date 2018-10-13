@extends('theme.default')


@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage MES Indicator Reporting</h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit MES indicator Report</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">

                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('mesindicatortrackings.index') }}"> Back</a>
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



                            <form action="{{ route('mesindicatortrackings.update',$mesindicatortracking->id) }}" method="POST">
                                @csrf
                                @method('PUT')


                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                            <strong>Reporting Date:</strong>
                                            <div class='input-group date' id='reporting_date'>
                                                <input type='text' name="reporting_date" value="{{ $mesindicatortracking->reporting_date }}"  class="form-control" disabled="disabled" />
                                                <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                            <strong>Financial Year:</strong>

                                            <select name="rollingplan_id" id="rollingplan_id" class="form-control" disabled="disabled">
                                                @foreach($rollingplans as $rollingplan)
                                                    <option value="{{$rollingplan->id}}" @if ($rollingplan->id==$mesindicatortracking->rollingplan_id) selected="selected" @endif>{{$rollingplan->start_year}} - {{$rollingplan->end_year}}</option>

                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                            <strong>Quarter:</strong>
                                            <select name="quarter" class="form-control" disabled="disabled">
                                                <option value="1" @if ($mesindicatortracking->quarter==1) selected="selected" @endif>Q1</option>
                                                <option value="2" @if ($mesindicatortracking->quarter==2) selected="selected" @endif>Q2</option>
                                                <option value="3" @if ($mesindicatortracking->quarter==3) selected="selected" @endif>Q3</option>
                                                <option value="4" @if ($mesindicatortracking->quarter==4) selected="selected" @endif>Q4</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                            <strong>County:</strong>

                                            <select name="county_id" id="county_id" class="form-control" disabled="disabled">
                                                <option value="">Select County</option>
                                                @foreach($counties as $county)
                                                    <option value="{{$county->id}}" @if ($mesindicatortracking->county_id==$county->id) selected="selected" @endif>{{$county->county}}</option>

                                                @endforeach
                                            </select>

                                        </div>

                                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                            <strong>Indicator Category:</strong>

                                            <select name="indicatorcategory_id" id="indicatorcategory_id" class="form-control" disabled="disabled">
                                                @foreach($indicatorcategories as $indicatorcategory)
                                                    <option value="{{$indicatorcategory->id}}" @if ($mesindicatortracking->indicatorcategory_id==$indicatorcategory->id) selected="selected" @endif>{{$indicatorcategory->category}}</option>

                                                @endforeach
                                            </select>

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Indicator</th>
                                                    <th>County Value</th>
                                                    <th>Sub-county Value</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach ($trackedindicators as $trackedindicator)
                                                    <tr><td>{{$trackedindicator->mesindicator->indicator_name}}<input type="hidden" name="id[]" value="{{$trackedindicator->id}}"></td>
                                                        <td><input type="text" name="county_value[]" value="{{$trackedindicator->county_value}}" class="form-control"></td>
                                                        <td><input type="text" name="subcounty_value[]" value="{{$trackedindicator->subcounty_value}}" class="form-control"></td></tr>
                                                @endforeach
                                                </tbody>

                                            </table>


                                        </div>

                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
@extends('theme.default')


@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage Rolling Plans</h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Rolling Plan</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">

                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('rollingplans.index') }}"> Back</a>
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



                            <form action="{{ route('rollingplans.update',$rollingplan->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="col-md-6 col-sm-12 col-xs-12  form-group">
                                        <strong>Start Year:</strong>

                                         <select name="start_year" id="start_year" class="form-control">

                                            @foreach($years as $year)
                                                <option value="{{$year}}" @if ($year==$rollingplan->start_year) selected="selected" @endif >{{$year}}</option>

                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12  form-group">
                                        <strong>End Year:</strong>

                                        <select name="end_year" id="end_year" class="form-control">

                                            @foreach($years as $year)
                                                <option value="{{$year}}" @if ($year==$rollingplan->end_year) selected="selected" @endif >{{$year}}</option>

                                            @endforeach
                                        </select>

                                        <input type="hidden" name="division_id" id="division_id" value="{{ $rollingplan->division_id }}">

                                    </div>

                                   <!-- <div class="form-group">
                                        <strong>Depatment:</strong>

                                        <select name="division_id" id="division_id" class="form-control">
                                            <option value="">Select Division</option>
                                            @foreach($divisions as $division)
                                                <option value="{{$division->id}}" @if ($division->id==$rollingplan->division_id) selected="selected" @endif >{{$division->division_name}}</option>

                                            @endforeach
                                        </select>

                                    </div>-->
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Year Start Date:</strong>

                                        <div class='input-group date' id='start_date'>
                                            <input type='text' class="form-control" name="start_date" value="{{$rollingplan->start_date}}" />
                                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                        </div>

                                    </div>

                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Year End Date:</strong>

                                        <div class='input-group date' id='end_date'>
                                            <input type='text' class="form-control" name="end_date" value="{{$rollingplan->end_date}}" />
                                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                        </div>

                                    </div>

                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Q1 Start Date:</strong>

                                        <div class='input-group date' id='quarter_one_start_date'>
                                            <input type='text' class="form-control" name="quarter_one_start_date" value="{{$rollingplan->quarter_one_start_date}}" />
                                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                        </div>

                                    </div>

                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Q1 End Date:</strong>

                                        <div class='input-group date' id='quarter_one_end_date'>
                                            <input type='text' class="form-control" name="quarter_one_end_date" value="{{$rollingplan->quarter_one_end_date}}" />
                                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                        </div>

                                    </div>


                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Q2 Start Date:</strong>

                                        <div class='input-group date' id='quarter_two_start_date'>
                                            <input type='text' class="form-control" name="quarter_two_start_date" value="{{$rollingplan->quarter_two_start_date}}" />
                                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                        </div>

                                    </div>

                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Q2 End Date:</strong>

                                        <div class='input-group date' id='quarter_two_end_date'>
                                            <input type='text' class="form-control" name="quarter_two_end_date" value="{{$rollingplan->quarter_two_end_date}}" />
                                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                        </div>

                                    </div>

                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Q3 Start Date:</strong>

                                        <div class='input-group date' id='quarter_three_start_date'>
                                            <input type='text' class="form-control" name="quarter_three_start_date" value="{{$rollingplan->quarter_three_start_date}}" />
                                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                        </div>

                                    </div>

                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Q3 End Date:</strong>

                                        <div class='input-group date' id='quarter_three_end_date'>
                                            <input type='text' class="form-control" name="quarter_three_end_date"  value="{{$rollingplan->quarter_three_end_date}}"/>
                                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                        </div>

                                    </div>

                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Q4 Start Date:</strong>

                                        <div class='input-group date' id='quarter_four_start_date'>
                                            <input type='text' class="form-control" name="quarter_four_start_date" value="{{$rollingplan->quarter_four_start_date}}" />
                                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                        </div>

                                    </div>

                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Q4 End Date:</strong>

                                        <div class='input-group date' id='quarter_four_end_date'>
                                            <input type='text' class="form-control" name="quarter_four_end_date" value="{{$rollingplan->quarter_four_end_date}}" />
                                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
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
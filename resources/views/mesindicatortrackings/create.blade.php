@extends('theme.default')


@section('content')

    <script language = "javascript" type = "text/javascript">
        <!--
        //Browser Support Code
        function ajaxFunction(){
            var ajaxRequest;  // The variable that makes Ajax possible!

            try {
                // Opera 8.0+, Firefox, Safari
                ajaxRequest = new XMLHttpRequest();
            }catch (e) {
                // Internet Explorer Browsers
                try {
                    ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                }catch (e) {
                    try{
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                    }catch (e){
                        // Something went wrong
                        alert("Your browser broke!");
                        return false;
                    }
                }
            }

            // Create a function that will receive data
            // sent from the server and will update
            // div section in the same page.

            ajaxRequest.onreadystatechange = function(){
                if(ajaxRequest.readyState == 4){
                    var ajaxDisplay = document.getElementById('ajaxDiv');
                    ajaxDisplay.innerHTML = ajaxRequest.responseText;
                }
            }

            // Now get the value from user and pass it to
            // server script.

            var indicatorcategory_id = document.getElementById('indicatorcategory_id').value;
            var queryString = "/" + indicatorcategory_id;


            ajaxRequest.open("GET", "<?php echo url('/'); ?>/mesindicatortrackings/getindicators" + queryString, true);
            ajaxRequest.send(null);
        }
        //-->
    </script>

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
                            <h2>Create MES indicator Report</h2>

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


                            {!! Form::open(array('route' => 'mesindicatortrackings.store','method'=>'POST')) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                        <strong>Reporting Date:</strong>
                                        <div class='input-group date' id='reporting_date'>
                                            <input type='text' name="reporting_date" class="form-control" />
                                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Financial Year:</strong>
                                        <select name="rollingplan_id" id="rollingplan_id" class="form-control">
                                            @foreach($rollingplans as $rollingplan)
                                                <option value="{{$rollingplan->id}}">{{$rollingplan->start_year}} - {{$rollingplan->end_year}}</option>

                                            @endforeach
                                        </select>
                                        <input type="hidden" name="user_id" id="user_id" value="{{$user_id}}">
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
                                        <strong>County:</strong>

                                        <select name="county_id" id="county_id" class="form-control">
                                            <option value="">Select County</option>
                                            @foreach($counties as $county)
                                                <option value="{{$county->id}}">{{$county->county}}</option>

                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                        <strong>Indicator Category:</strong>

                                        <select name="indicatorcategory_id" id="indicatorcategory_id" onChange="ajaxFunction()" class="form-control" required="required">
                                            <option value="">Select Category</option>
                                            @foreach($indicatorcategories as $indicatorcategory)
                                                <option value="{{$indicatorcategory->id}}">{{$indicatorcategory->category}}</option>

                                            @endforeach
                                        </select>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">

                                        <div id = 'ajaxDiv'>

                                        </div>


                                    </div>

                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12 text-left">
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
@extends('theme.default')


@section('content')

    <script language = "javascript" type = "text/javascript">
        <!--
        //Browser Support Code
        function getOutputs(){
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
                    var ajaxDisplay = document.getElementById('outputs');
                    ajaxDisplay.innerHTML = ajaxRequest.responseText;
                }
            }

            // Now get the value from user and pass it to
            // server script.

            var task_id = document.getElementById('task_id').value;
            var queryString = "/" + task_id;

            ajaxRequest.open("GET", "<?php echo url('/'); ?>/taskreportings/getoutputs" + queryString, true);
            ajaxRequest.send(null);
        }
        //-->
    </script>
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage Task Reportings</h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Create Task Report</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">

                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('taskreportings.index') }}"> Back</a>
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


                            {!! Form::open(array('route' => 'taskreportings.store','method'=>'POST')) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Report Title:</strong>

                                       <input type="text" name="report_title" id="report_title" value="" class="form-control">

                                    </div>

                                    <div class="form-group">
                                        <strong>Report Date:</strong>

                                        <div class='input-group date' id='reporting_date'>
                                            <input type='text' name="reporting_date" class="form-control" />
                                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <strong>Quarter:</strong>

                                        <select name="quarter" id="quarter" class="form-control">
                                            <option value="">Select Quarter</option>
                                            <option value="Q1">Q1</option>
                                            <option value="Q1">Q2</option>
                                            <option value="Q1">Q3</option>
                                            <option value="Q1">Q4</option>
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <strong>Task:</strong>

                                        <select name="task_id" id="task_id" class="form-control" onChange="getOutputs()" required="required">
                                            <option value="">Select Task</option>
                                            @foreach ($tasks as $task)
                                                <option value="{{$task->task->id}}">{{$task->task->task_name}}</option>

                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <strong>Expected Output:</strong>
                                        <div id="outputs">
                                        <select name="expectedoutput_id" id="expectedoutput_id" class="form-control">
                                            <option value="">Select Output</option>

                                        </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <strong>Activity:</strong>

                                        <select name="mainactivity_id" id="mainactivity_id" class="form-control">
                                            <option value="">Select Activity</option>
                                            @foreach($mainactivities as $mainactivity)
                                                <option value="{{$mainactivity->id}}">{{$mainactivity->activity_name}}</option>

                                            @endforeach
                                        </select>

                                    </div>


                                    <div class="form-group">
                                        <strong>Performance Indicator:</strong>

                                        <select name="performanceindicator_id" id="performanceindicator_id" class="form-control">
                                            <option value="">Select Indicator</option>
                                            @foreach($performanceindicators as $performanceindicator)
                                                <option value="{{$performanceindicator->id}}">{{$performanceindicator->indicator}}</option>

                                            @endforeach
                                        </select>

                                    </div>



                                    <div class="form-group">
                                        <strong>Output Target:</strong>

                                        <input type="text" name="output_target" id="output_target" value="" class="form-control">

                                    </div>

                                    <div class="form-group">
                                        <strong>Status:</strong>

                                        <select name="status" id="status" class="form-control">
                                            <option value="">Select Status</option>
                                           <option value="1">Not Started</option>
                                            <option value="2">On going</option>
                                            <option value="3">Near Completion</option>
                                            <option value="4">Completed</option>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <strong>Target Met:</strong>

                                        <select name="status" id="status" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <strong>Target Numbers:</strong>

                                        <input type="text" name="target_numbers" id="target_numbers" value="" class="form-control">

                                    </div>
                                    <div class="form-group">
                                        <strong>Description of Achievement:</strong>

                                        <textarea name="description_of_achievement" id="description_of_achievement" class="form-control"></textarea>

                                    </div>
                                    <div class="form-group">
                                        <strong>Attachment <small>(Means of Veirfication)</small>:</strong>

                                       <input type="file" name="attachment" id="attachment" class="form-control">
                                    </div>



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
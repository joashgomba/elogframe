@extends('theme.default')


@section('content')

s

    <style>
        #loader{
            visibility:hidden;
        }
    </style>

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

        var unit_id = document.getElementById('unit_id').value;
        var rollingplan_id = document.getElementById('rollingplan_id').value;
        var queryString = "/" + unit_id;

        queryString +=  "/" + rollingplan_id;
        ajaxRequest.open("GET", "<?php echo url('/'); ?>/units/getworkplans" + queryString, true);
        ajaxRequest.send(null);
    }
    //-->
</script>

<script language = "javascript" type = "text/javascript">
    <!--
    //Browser Support Code
    function getActivities(){
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
                var ajaxDisplay = document.getElementById('activities');
                ajaxDisplay.innerHTML = ajaxRequest.responseText;
            }
        }

        // Now get the value from user and pass it to
        // server script.

        var annualworkplan_id = document.getElementById('annualworkplan_id').value;
        var queryString = "/" + annualworkplan_id;

        ajaxRequest.open("GET", "<?php echo url('/'); ?>/annualworkplans/getactivities" + queryString, true);
        ajaxRequest.send(null);
    }
    //-->
</script>


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

        var mainactivity_id = document.getElementById('mainactivity_id').value;
        var queryString = "/" + mainactivity_id;

        ajaxRequest.open("GET", "<?php echo url('/'); ?>/mainactivities/getoutputs" + queryString, true);
        ajaxRequest.send(null);
    }
    //-->
</script>

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage Tasks</h3>
                </div>


            </div>

            <div id="loader" class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Create Task</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">

                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('tasks.index') }}"> Back</a>
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


                            {!! Form::open(array('route' => 'tasks.store','method'=>'POST','id'=>'frm', 'name'=>'frm')) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">


                                    <div class="form-group">
                                        <strong>Rolling Plan:</strong>

                                        <select name="rollingplan_id" id="rollingplan_id" class="form-control">
                                            <option value="0">Select Rolling Plan</option>
                                            @foreach($rollingplans as $rollingplan)
                                                <option value="{{$rollingplan->id}}">{{$rollingplan->start_year}} - {{$rollingplan->end_year}}</option>

                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <strong>Unit:</strong>

                                        <select name="unit_id" id="unit_id" class="form-control" onChange="ajaxFunction()" required="required">
                                            <option value="0">Select Unit</option>
                                            @foreach($units as $unit)
                                                <option value="{{$unit->id}}">{{$unit->unit_name}}</option>

                                            @endforeach
                                        </select>

                                    </div>


                                    <div class="form-group">
                                        <strong>Annual Work Plan:</strong>

                                        <div id = 'ajaxDiv'>

                                        <select name="annualworkplan_id" id="annualworkplan_id" class="form-control" required="required">
                                            <option value="">Select Work Plan Period</option>

                                        </select>

                                        </div>

                                    </div>



                                    <div class="form-group">
                                        <strong>Activity:</strong>
                                        <div id="activities">
                                        <select name="mainactivity_id" id="mainactivity_id" class="form-control" required="required">
                                            <option value="">Select Activity</option>

                                        </select>

                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <strong>Expected Output:</strong>
                                        <div id="outputs">
                                        <select name="expectedoutput_id" id="expectedoutput_id" class="form-control" required="required">

                                            <option value="">Select Output</option>


                                        </select>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <strong>Task Name:</strong>

                                        <input type="text" name="task_name" id="task_name" value="" class="form-control">

                                    </div>
                                    <div class="form-group">
                                        <strong>Task Description:</strong>

                                        <textarea name="task_description" class="form-control"></textarea>

                                    </div>
                                    <div class="form-group">
                                        <strong>Priotity:</strong>

                                        <select name="priority" id="priority" class="form-control">
                                            <option value="3">High</option>
                                            <option value="2">Medium</option>
                                            <option value="1">Low</option>

                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <strong>Start Date:</strong>

                                        <div class='input-group date' id='start_date'>
                                            <input type='text' name="start_date" class="form-control" />
                                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <strong>End Date:</strong>

                                        <div class='input-group date' id='end_date'>
                                            <input type='text' name="end_date" class="form-control" />
                                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <strong>Assign Task Lead:</strong>

                                        <select name="user_id" id="user_id" class="form-control">
                                            <option value="">Select Staff</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>

                                            @endforeach

                                        </select>

                                    </div>

                                    <div class="form-group">
                                        <strong>Assign Employees:</strong>

                                        <select name="task_user_id[]" id="task_user_id" class="form-control" multiple="multiple">

                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>

                                            @endforeach

                                        </select>

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
<script src="{!! asset('theme/js/jquery.min.js') !!}"></script>

<script type="application/javascript">
    $(document).ready(function() {

        $('select[name="annualworkplan_id"]').on('change', function(){
            var annualworkplan_id = $(this).val();
            var route = '{{ route("annualworkplans.getactivities", ":annualworkplan_id") }}';
            route = route.replace(':annualworkplan_id', annualworkplan_id);
            if(annualworkplan_id) {
                $.ajax({
                    url: route,
                    type:"GET",
                    dataType:"json",
                    beforeSend: function(){
                        $('#loader').css("visibility", "visible");
                    },

                    success:function(data) {

                        $('select[name="mainactivity_id"]').empty();
                        $('select[name="mainactivity_id"]').append('<option value="">Select Activity</option>');

                        $.each(data, function(key, value){

                            $('select[name="mainactivity_id"]').append('<option value="'+ key +'">' + value + '</option>');

                        });
                    },
                    complete: function(){
                        $('#loader').css("visibility", "hidden");
                    }
                });
            } else {
                $('select[name="mainactivity_id"]').empty();

                $('select[name="mainactivity_id"]').append('<option value="">Select Activity</option>');
            }

        });

    });


</script>



@endsection
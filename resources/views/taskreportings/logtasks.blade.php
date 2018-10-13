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


                            
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                   
					<div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Task Details</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Task Logs/Reporting</a>
                        </li>
                       
                      </ul>
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <table class="table table-striped jambo_table bulk_action">
                                <tr><td><strong>Rolling Plan:</strong></td><td>{{$rollingplan->start_year}} - {{$rollingplan->end_year}}</td></tr>
                                <tr><td><strong>Unit:</strong></td><td>{{$unit->unit_name}}</td></tr>
                                <tr><td><strong>Work Plan:</strong></td><td>{{$annualworkplan->unit->unit_name}} Work Plan ({{$annualworkplan->rollingplan->start_year}}/{{$annualworkplan->rollingplan->end_year}})</td></tr>
                                <tr><td><strong>Activity:</strong></td><td>{{$mainactivity->activity_name}}</td></tr>
                                <tr><td><strong>Expected Output:</strong></td><td>{{$expectedoutput->output}}</td></tr>
                                <tr><td><strong>Task:</strong></td><td>{{$task->task_name}}</td></tr>
                                <tr><td><strong>Task Description:</strong></td><td>{{$task->task_description}}</td></tr>
                                <tr><td><strong>Priority:</strong></td><td>
                                        @if ($task->priority==3)
                                            High
                                        @elseif($task->priority==2)
                                            Medium
                                        @else
                                            Low
                                        @endif

                                    </td></tr>
                                <tr><td><strong>Progress:</strong></td><td>
                                        @php($percentage_progress = $task->taskreportings()->max('percentage_progress'))
                                            @if(empty($percentage_progress))
                                                0%
                                            @else
                                                {{$percentage_progress}}%
                                            @endif

                                                <div class="progress progress_sm" style="width: 76%;">
                                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="{{$percentage_progress}}"></div>
                                                </div>
                                    </td></tr>
                                <tr><td><strong>Start Date:</strong></td><td>{{$task->start_date}}</td></tr>
                                <tr><td><strong>End Date:</strong></td><td>{{$task->end_date}}</td></tr>
                                <tr><td><strong>Duration:</strong></td><td>
                                        @php($date1 = date_create($task->start_date))
                                        @php($date2 = date_create($task->end_date))
                                        @php($diff = date_diff($date1,$date2))

                                        {{$diff->format("%a")}} days
                                    </td></tr>
                                <tr><td><strong>Days Left:</strong></td><td>
                                        @php($today = date('Y-m-d'))
                                        @php($start = strtotime($today))
                                        @php($end = strtotime($task->end_date))
                                        @php($days_between = ceil(abs($end - $start) / 86400))

                                        @if($today>$task->end_date)
                                           0 days
                                        @else
                                           {{$days_between}} days
                                        @endif
                                    </td></tr>
                                <tr><td><strong>Assigned Task Lead:</strong></td><td>
                                        @foreach($users as $user)
                                            @if ($task->user_id==$user->id)
                                                {{$user->name}}
                                            @endif
                                        @endforeach
                                    </td></tr>
                                <tr><td><strong>Assigned Employees:</strong></td><td>
                                        @foreach($users as $user)
                                            @php($taskusers = $user->taskusers)
                                            @foreach($taskusers as $taskuser)
                                                @if($taskuser->user_id==$user->id && $taskuser->task_id==$task->id)
                                                        {{$user->name}},
                                                @endif
                                            @endforeach

                                        @endforeach
                                    </td></tr>

                            </table>

						  
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
						{!! Form::open(array('route' => 'taskreportings.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
                          
						  <div class="col-xs-12 col-sm-12 col-md-12">
						  
								<div class="form-group">
                                    <strong>Indicator:</strong>

                                    <input type="text" name="indicator" id="indicator" value="{{$expectedoutput->performanceindicator->indicator}}" disabled = "disabled" class="form-control">

                                </div>
								<div class="form-group">
                                    <strong>Target Output:</strong>

                                    <input type="text" name="target_output" id="target_output" value="{{$expectedoutput->performanceindicator->target_output}}" disabled = "disabled" class="form-control">

                                </div>
								
								<div class="form-group">
                                    <strong>Means of Verification:</strong>

                                    <input type="text" name="means_of_verification" id="means_of_verification" value="{{$expectedoutput->performanceindicator->means_of_verification}}" disabled = "disabled" class="form-control">

                                </div>
                              <div class="form-group">
                                  <strong>Quarter:</strong>

                                  <input type="hidden" name="mainactivity_id" value="{{$mainactivity->id}}">
                                  <input type="hidden" name="expectedoutput_id" value="{{$expectedoutput->id}}">
                                  <input type="hidden" name="performanceindicator_id" value="{{$expectedoutput->performanceindicator->id}}">
                                  <input type="hidden" name="task_id" value="{{$task->id}}">
                                  <input type="hidden" name="output_target" value="{{$expectedoutput->performanceindicator->target_output}}">

                                  <select name="quarter" id="quarter" class="form-control">
                                      <option value="">Select Quarter</option>
                                      <option value="Q1">Q1</option>
                                      <option value="Q1">Q2</option>
                                      <option value="Q1">Q3</option>
                                      <option value="Q1">Q4</option>
                                  </select>

                              </div>
								<div class="form-group">
                                        <strong>Reporting Date:</strong>

                                        <div class='input-group date' id='reporting_date'>
                                            <input type='text' name="reporting_date" class="form-control" />
                                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                        </div>

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
                                        <strong>Progress:</strong>
																				
										@php($percentage = $task->taskreportings()->max('percentage_progress'))
                                        <select name="percentage_progress" id="percentage_progress" class="form-control">
                                            <option value="0">0%</option>
													<option value="5" @if($percentage==5) selected="selected" @endif>5%</option>
													<option value="10" @if($percentage==10) selected="selected" @endif>10%</option>
													<option value="15" @if($percentage==15) selected="selected" @endif>15%</option>
													<option value="20" @if($percentage==20) selected="selected" @endif>20%</option>
													<option value="25" @if($percentage==25) selected="selected" @endif>25%</option>
													<option value="30" @if($percentage==30) selected="selected" @endif>30%</option>
													<option value="35" @if($percentage==35) selected="selected" @endif>35%</option>
													<option value="40" @if($percentage==40) selected="selected" @endif>40%</option>
													<option value="45" @if($percentage==45) selected="selected" @endif>45%</option>
													<option value="50" @if($percentage==50) selected="selected" @endif>50%</option>
													<option value="55" @if($percentage==55) selected="selected" @endif>55%</option>
													<option value="60" @if($percentage==60) selected="selected" @endif>60%</option>
													<option value="65" @if($percentage==65) selected="selected" @endif>65%</option>
													<option value="70" @if($percentage==70) selected="selected" @endif>70%</option>
													<option value="75" @if($percentage==75) selected="selected" @endif>75%</option>
													<option value="80" @if($percentage==80) selected="selected" @endif>80%</option>
													<option value="85" @if($percentage==85) selected="selected" @endif>85%</option>
													<option value="90" @if($percentage==90) selected="selected" @endif>90%</option>
													<option value="95" @if($percentage==95) selected="selected" @endif>95%</option>
													<option value="100" @if($percentage==100) selected="selected" @endif>100%</option>
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
                                        <strong>Numbers Met (Output):</strong>

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
                                    <button type="submit" class="btn btn-primary">SUBMIT TASK LOG</button>
                                </div>
						  {!! Form::close() !!}
							<table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Report Title</th>
                                        <th>Number Met</th>
										<th>Progress</th>
										<th>Status</th>
                                        <th>Achievement</th>
                                        <th>Attachment</th>
                                        
                                    </tr>
                                </thead>
								<tbody>
									@foreach ($taskreportings as $taskreporting)
									<tr>
										<td>{{$taskreporting->reporting_date}}</td>
										<td>{{$taskreporting->report_title}}</td>
										<td>{{$taskreporting->target_numbers}}</td>
										<td>{{$taskreporting->percentage_progress}}</td>
										<td>
										@if($taskreporting->status==1)
											Not Started
										@elseif ($taskreporting->status==2)
											On going
										@elseif	($taskreporting->status==3)
											Near Completion
										@else
											Completed
										@endif
										</td>
										<td>{{$taskreporting->description_of_achievement}}</td>
										<td>
                                            <a href="{{ URL::to('files/kephi.docx') }}" class="green" target="_blank"> <i class="fa fa-file-o"></i> Download Document</a>
                                        </td>
									</tr>
									
									@endforeach
								</tbody>
								
							</table>
                        </div>
                        
                      </div>
                    </div>
                                    
                                  
                                    




                                </div>


                              
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->



@endsection
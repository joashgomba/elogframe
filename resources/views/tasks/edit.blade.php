@extends('theme.default')


@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage Tasks</h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Task</h2>

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



                            <form action="{{ route('tasks.update',$task->id) }}" id="frm" name="frm" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">


                                        <div class="form-group">
                                            <strong>Rolling Plan:</strong>

                                            <select name="rollingplan_id" id="rollingplan_id" class="form-control" readonly="readonly">
                                                <option value="{{$rollingplan->id}}">{{$rollingplan->start_year}} - {{$rollingplan->end_year}}</option>

                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <strong>Unit:</strong>

                                            <select name="unit_id" id="unit_id" class="form-control" readonly="readonly">
                                                <option value="{{$unit->id}}">{{$unit->unit_name}}</option>

                                            </select>

                                        </div>


                                        <div class="form-group">
                                            <strong>Annual Work Plan:</strong>



                                                <select name="annualworkplan_id" id="annualworkplan_id" class="form-control" readonly="readonly">

                                                    <option value="{{$annualworkplan->id}}">{{$annualworkplan->unit->unit_name}} Work Plan ({{$annualworkplan->rollingplan->start_year}}/{{$annualworkplan->rollingplan->end_year}})</option>

                                                </select>



                                        </div>



                                        <div class="form-group">
                                            <strong>Activity:</strong>
                                            <div id="activities">
                                                <select name="mainactivity_id" id="mainactivity_id" class="form-control" readonly="readonly">
                                                    <option value="{{$mainactivity->id}}">{{$mainactivity->activity_name}}</option>

                                                </select>

                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <strong>Expected Output:</strong>
                                            <div id="outputs">
                                                <select name="expectedoutput_id" id="expectedoutput_id" class="form-control" readonly="readonly">

                                                    <option value="{{$expectedoutput->id}}">{{$expectedoutput->output}}</option>


                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <strong>Task Name:</strong>

                                            <input type="text" name="task_name" id="task_name" value="{{$task->task_name}}" class="form-control">

                                        </div>
                                        <div class="form-group">
                                            <strong>Task Description:</strong>

                                            <textarea name="task_description" class="form-control">{{$task->task_description}}</textarea>

                                        </div>
                                        <div class="form-group">
                                            <strong>Priotity:</strong>

                                            <select name="priority" id="priority" class="form-control">
                                                <option value="3" @if ($task->priority==3) selected="selected" @endif>High</option>
                                                <option value="2" @if ($task->priority==2) selected="selected" @endif>Medium</option>
                                                <option value="1" @if ($task->priority==1) selected="selected" @endif>Low</option>

                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <strong>Start Date:</strong>

                                            <div class='input-group date' id='start_date'>
                                                <input type='text' name="start_date" value="{{$task->start_date}}" class="form-control" />
                                                <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <strong>End Date:</strong>

                                            <div class='input-group date' id='end_date'>
                                                <input type='text' name="end_date" value="{{$task->end_date}}" class="form-control" />
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
                                                    <option value="{{$user->id}}" @if ($task->user_id==$user->id) selected="selected" @endif>{{$user->name}}</option>

                                                @endforeach

                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <strong>Assign Employees:</strong>

                                            <select name="task_user_id[]" id="task_user_id" class="form-control" multiple="multiple">

                                                @foreach($users as $user)
                                                    {{$taskusers = $user->taskusers}}
                                                    {{$selected=""}}
                                                    @foreach($taskusers as $taskuser)
                                                        @if($taskuser->user_id==$user->id && $taskuser->task_id==$task->id)
                                                            {{$selected='selected="selected'}}
                                                        @endif

                                                    @endforeach
                                                    <option value="{{$user->id}}" {{$selected}}>{{$user->name}}</option>

                                                @endforeach

                                            </select>


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
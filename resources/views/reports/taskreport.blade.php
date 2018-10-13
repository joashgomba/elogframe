@extends('theme.default')


@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Activity Implementation Report</h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Generated Report</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">


                            <div class="row">

                                    <div class="col-md-12">

                                        <div class="pull-right">
                                            <a href="" target="_blank" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Download Activity Task Tracking Table</a>
                                        </div>

                                    </div>


                                <table class="table table-striped jambo_table bulk_action">
                                    <tr><td>Department</td><td>{{$department->department_name}}</td><td>Division</td><td>{{$division->division_name}}</td></tr>
                                    <tr><td>Unit</td><td>{{$unit->unit_name}}</td><td>Financial Year</td><td>{{$rollingplan->start_year}} - {{$rollingplan->end_year}}</td></tr>
                                </table>

                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                    <tr><th colspan="7">{{$unit->unit_name}} Activity Task Implementation Tracking</th></tr>
                                    <tr>
                                        <th>Main Activities</th>
                                    </tr>
                                    </thead>
                                </table>

                                <!-- start accordion -->
                                <div class="accordion" id="accordion" role="tablist" aria-multiselectable="false">
                                    @foreach($mainactivities as $mainactivity)
                                        @php($quarter_one = $mainactivity->quarter_one)
                                        @php($quarter_two = $mainactivity->quarter_two)
                                        @php($quarter_three = $mainactivity->quarter_three)
                                        @php($quarter_four = $mainactivity->quarter_four)

                                        @if($mainactivity->id==3)
                                           @php($bgcolor = '#239B56')
                                        @else
                                           @php($bgcolor = '#C70039')
                                        @endif
                                    <div class="panel">

                                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$mainactivity->id}}" aria-expanded="false" aria-controls="collapseTwo">
                                            <h4 class="panel-title">{{$mainactivity->activity_name}}
                                                @if($mainactivity->id==3)
                                                    <span class="label label-success">100%</span>
                                                @else
                                                    <span class="label label-danger">0%</span>
                                                @endif</h4>
                                        </a>
                                        <div id="collapse{{$mainactivity->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <table class="table table-striped jambo_table bulk_action">
                                                    <thead>
                                                    <tr><th>Target End</th><th>Days Left</th><th>Activity</th><th>Total Tasks</th><th>Completed Tasks</th><th>Status</th></tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr><td bgcolor="#F9E79F">
                                                            @php($total_quarters = $quarter_one+$quarter_two+$quarter_three+$quarter_four)
                                                                @if($total_quarters==4)
                                                                    {{$rollingplan->quarter_four_end_date}}
                                                                @endif
                                                                @if($total_quarters==3)
                                                                    {{$rollingplan->quarter_three_end_date}}
                                                                @endif
                                                                @if($total_quarters==2)
                                                                    {{$rollingplan->quarter_two_end_date}}
                                                                @endif
                                                                @if($total_quarters==1)
                                                                    {{$rollingplan->quarter_one_end_date}}
                                                                @endif</td>
                                                        <td bgcolor="#D5F5E3">
                                                            @if($total_quarters==4)
                                                                @php($enddate=$rollingplan->quarter_four_end_date)
                                                            @endif
                                                            @if($total_quarters==3)
                                                                @php($enddate=$rollingplan->quarter_three_end_date)
                                                            @endif
                                                            @if($total_quarters==2)
                                                                @php($enddate=$rollingplan->quarter_two_end_date)
                                                            @endif
                                                            @if($total_quarters==1)
                                                                @php($enddate=$rollingplan->quarter_one_end_date)
                                                            @endif

                                                            @php($today = date('Y-m-d'))
                                                            @php($start = strtotime($today))
                                                            @php($end = strtotime($enddate))
                                                            @php($days_between = ceil(abs($end - $start) / 86400))

                                                            @if($today>$enddate)
                                                                0 days
                                                            @else
                                                                {{$days_between}} days
                                                            @endif
                                                        </td><td>{{$mainactivity->activity_name}}</td><td>
                                                            @php($total_tasks = count($mainactivity->tasks))
                                                            {{$total_tasks}}
                                                        </td><td>{{$total_tasks}}</td><td bgcolor="{{$bgcolor}}">
                                                            @if($mainactivity->id==3)
                                                                <font color="#ffffff">100%</font>
                                                            @else
                                                                <font color="#ffffff">0%</font>
                                                            @endif
                                                        </td></tr>
                                                    </tbody>
                                                </table>
                                                <table class="table table-striped jambo_table bulk_action">
                                                    <thead>
                                                    <tr>
                                                        <th>Task</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Days Left</th>
                                                        <th>Progress</th>
                                                        <th>Responsible</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($mainactivity->tasks as $task)
                                                        <tr>
                                                            <td>{{$task->task_name}}</td>
                                                            <td>{{$task->start_date}}</td>
                                                            <td bgcolor="#F9E79F">{{$task->end_date}}</td>
                                                            <td bgcolor="#D5F5E3">
                                                            @php($thestart = strtotime($today))
                                                            @php($theend = strtotime($task->end_date))
                                                            @php($days_left = ceil(abs($theend - $thestart) / 86400))

                                                            @if($today>$task->end_date)
                                                               0 days
                                                            @else
                                                              {{$days_left}} days
                                                            @endif
                                                            </td>
                                                            <td bgcolor="{{$bgcolor}}">
                                                                @if($mainactivity->id==3)
                                                                    <font color="#ffffff">100%</font>
                                                                @else
                                                                    <font color="#ffffff">0%</font>
                                                                @endif</td>
                                                            <td>
                                                                <table class="table table-striped jambo_table bulk_action">
                                                                    <thead>
                                                                    <tr><th>Name</th><th>Email</th></tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($users as $user)

                                                                        @foreach($task->taskusers as $taskuser)
                                                                            @if($taskuser->user_id==$user->id && $taskuser->task_id==$task->id)
                                                                            <tr><td>{{$user->name}}</td><td>{{$user->email}}</td></tr>
                                                                            @endif
                                                                        @endforeach
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>

                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                <!-- end of accordion -->



                            </div>
                        </div>
                    </div>
                </div>
            </div>





        </div>
    </div>
    <!-- /page content -->



@endsection
@extends('theme.default')


@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage Task Reports</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Task Reports</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">

                                    <div class="pull-right">
                                        @can('taskreporting-create')
                                           <!-- <a class="btn btn-success" href="{{ route('taskreportings.create') }}"> Create New Task Report</a>-->
                                        @endcan
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

                            <div class="col-md-12">
                                <span class="label label-default">Stopped</span>
                                <span class="label label-info">Future</span>
                                <span class="label label-success">On time</span>
                                <span class="label label-warning">Warning</span>
                                <span class="label label-danger">Overdue</span>

                            </div>
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Task</th>
                                        <th>Description</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Duration</th>
                                        <th>Days Left</th>
                                        <th>Progress</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($usertasks as $usertask)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{$usertask->task->task_name}}</td>
                                        <td>{{$usertask->task->task_description}}</td>
                                        <td>{{$usertask->task->start_date}}</td>
                                        <td>{{$usertask->task->end_date}}</td>
                                        <td>
                                            @php
                                                $date1 = date_create($usertask->task->start_date);
                                                $date2 = date_create($usertask->task->end_date);
                                                //difference between two dates
                                                $diff = date_diff($date1,$date2);

                                            @endphp

                                            {{$diff->format("%a")}} days
                                        </td>
                                        <td>
                                            @php($today = date('Y-m-d'))
                                            @php($start = strtotime($today))
                                            @php($end = strtotime($usertask->task->end_date))
                                            @php($days_between = ceil(abs($end - $start) / 86400))

                                            @if($today>$usertask->task->end_date)
                                                0 days
                                            @else
                                             {{$days_between}} days
                                            @endif
                                        </td>
                                        <td>
                                            @php($percentage_progress = $usertask->task->taskreportings()->max('percentage_progress'))
                                            @if(empty($percentage_progress))
                                                0%
                                            @else
                                                {{$percentage_progress}}%

                                                @php($color = 'green')

                                                @if($today >= $usertask->task->end_date)

                                                    @if($percentage_progress!=100)
                                                         @php($color = 'red')
                                                    @endif

                                                @else

                                                    @if($days_between<=14)
                                                       @if($percentage_progress<=90)
                                                         @php($color = 'red')
                                                       @endif
                                                    @endif

                                                    @if($days_between>=15 && $days_between<=90){{--Less than or equal to 3 months--}}

                                                        @if($percentage_progress<=25)
                                                           @php($color = 'red')
                                                        @elseif($percentage_progress>=26 && $percentage_progress<=75)
                                                           @php($color = 'orange')
                                                        @else
                                                          @php($color = 'green')
                                                        @endif

                                                    @endif



                                                @endif

                                                <div class="progress progress_sm" style="width: 76%;">
                                                    <div class="progress-bar bg-{{$color}}" role="progressbar" data-transitiongoal="{{$percentage_progress}}"></div>
                                                </div>


                                            @endif
                                        </td>
                                        <td>
										 <a class="text-success" href="{{ route('taskreportings.logtasks',$usertask->task->id) }}" style="font-size:24px"><i class="fa fa-list"></i></a>
										</td>
                                    </tr>
                                @endforeach
                            </table>


                            {!! $usertasks->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->



@endsection
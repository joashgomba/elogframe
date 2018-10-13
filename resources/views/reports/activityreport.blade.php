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
                                <form id="action-form" action="{{ route('reports.taskreport') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="department_id" value="{{$department->id}}">
                                    <input type="hidden" name="division_id" value="{{$division->id}}">
                                    <input type="hidden" name="unit_id" value="{{$unit->id}}">
                                    <input type="hidden" name="rollingplan_id" value="{{$rollingplan->id}}">
                                    <div class="col-md-12">
                                        <div class="pull-right">
                                            <a href="{{ route('reports.taskreport') }}" onclick="event.preventDefault();
                                                     document.getElementById('action-form').submit();" class="btn btn-success"><i class="fa fa-cogs"></i> Task Details</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="" target="_blank" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Download Activity Tracking Table</a>
                                        </div>

                                    </div>
                                </form>

                                <table class="table table-striped jambo_table bulk_action">
                                    <tr><td>Department</td><td>{{$department->department_name}}</td><td>Division</td><td>{{$division->division_name}}</td></tr>
                                    <tr><td>Unit</td><td>{{$unit->unit_name}}</td><td>Financial Year</td><td>{{$rollingplan->start_year}} - {{$rollingplan->end_year}}</td></tr>
                                </table>

                                 <table class="table table-striped jambo_table bulk_action">
                                  <thead>
                                  <tr><th colspan="7">{{$unit->unit_name}} Activity Implementation Tracking</th></tr>
                                   <tr>
                                       <th>Activity</th><th>Quarter</th><th>Target End</th><th>Days Left</th><th>Status<span class="label label-success">Met</span>
                                           <span class="label label-danger">Not Met</span>
                                       </th>
                                   </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($mainactivities as $mainactivity)
                                      @if($mainactivity->id==3)
                                          @php($bgcolor = '#239B56')
                                      @else
                                          @php($bgcolor = '#C70039')
                                      @endif

                                      @php($quarter_one = $mainactivity->quarter_one)
                                      @php($quarter_two = $mainactivity->quarter_two)
                                      @php($quarter_three = $mainactivity->quarter_three)
                                      @php($quarter_four = $mainactivity->quarter_four)

                                      <tr><td>{{$mainactivity->activity_name}}</td>
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
                                          <td bgcolor="#F9E79F">

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
                                              @endif
                                          </td>
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
                                          </td>
                                         <td bgcolor="{{$bgcolor}}">
                                              @if($mainactivity->id==3)
                                                  <font color="#ffffff">100%</font>
                                              @else
                                                  <font color="#ffffff">0%</font>
                                              @endif
                                          </td></tr>
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
    <!-- /page content -->



@endsection
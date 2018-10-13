@extends('theme.default')


@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Activity Indicator Report</h3>
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
                                        <a href="" target="_blank" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Download Indicator Tracking Table</a>
                                    </div>

                                </div>

                                <table class="table table-striped jambo_table bulk_action">
                                    <tr><td>Department</td><td>{{$department->department_name}}</td><td>Division</td><td>{{$division->division_name}}</td></tr>
                                    <tr><td>Unit</td><td>{{$unit->unit_name}}</td><td>Financial Year</td><td>{{$rollingplan->start_year}} - {{$rollingplan->end_year}}</td></tr>
                                </table>

                                 <table class="table table-striped jambo_table bulk_action">
                                  <thead>
                                  <tr><th colspan="7">{{$unit->unit_name}} Activity Indicators Tracking</th></tr>
                                   <tr>
                                       <th>Activity</th><th>Expected Output</th><th>Indicator</th><th>Target</th><th>Output</th><th>Remarks</th><th>Status
                                           <span class="label label-success">Met</span>
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
                                      <tr><td>{{$mainactivity->activity_name}}</td><td>
                                              @foreach($mainactivity->expectedoutputs as $output)
                                                  {{$output->output}}
                                              @endforeach</td><td>
                                              @foreach($mainactivity->performanceindicators as $performanceindicator)
                                                  {{$performanceindicator->indicator}}
                                              @endforeach
                                          </td><td bgcolor="#F9E79F">
                                              @foreach($mainactivity->performanceindicators as $performanceindicator)
                                                  {{$performanceindicator->target_output}}
                                              @endforeach
                                          </td>
                                          <td bgcolor="#D5F5E3">
                                              @if($mainactivity->id==3)
                                                  1
                                              @else
                                                  0
                                              @endif
                                          </td>
                                          <td>
                                              @if($mainactivity->id==3)
                                                The KEPH has been finalized, printed and disseminated
                                              @else

                                              @endif

                                          </td><td bgcolor="{{$bgcolor}}">
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
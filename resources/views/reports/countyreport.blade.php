@extends('theme.default')


@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>MES Indicator Per County</h3>
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

                                <table class="table table-striped jambo_table bulk_action">
                                  <thead>
                                    <tr><th colspan="2">{{$mesindicator->indicator_name}} in all counties</th> </tr>
                                  </thead>
                                    <tbody>
                                    <tr><td>Financial Year</td><td>{{$rollingplan->start_year}} - {{$rollingplan->end_year}}</td></tr>
                                    <tr><td>Quarter</td><td>Q{{$quarter}}</td></tr>
                                    </tbody>

                                </table>

                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                    <tr><th rowspan="2" >County</th><th colspan="2">{{$mesindicator->indicator_name}}</th></tr>
                                    <tr><th>County Level</th><th>Sub County Level</th></tr>
                                    </thead>
                                    <tbody>
                                    @foreach($counties as $county)
                                        @php($number = rand(50,300))
                                        @php($number2 = rand(70,400))
                                       <tr>
                                           <td>{{$county->county}}</td>
                                           <td>{{$number}}</td>
                                           <td>{{$number2}}</td>
                                       </tr>

                                    @endforeach
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>MES Indicator per County</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>


                        <div class="x_content">
                            <div id="container" style="min-width: 310px; max-width: 800px; height: 1200px; margin: 0 auto"></div>



                            <script type="text/javascript">

                                Highcharts.chart('container', {
                                    chart: {
                                        type: 'bar'
                                    },
                                    title: {
                                        text: '{{$mesindicator->indicator_name}} in all counties'
                                    },
                                    subtitle: {
                                        text: 'Financial Year {{$rollingplan->start_year}} - {{$rollingplan->end_year}} Q{{$quarter}}'
                                    },
                                    xAxis: {
                                        categories: [
                                            @foreach($counties as $county)
                                                '{{$county->county}}',
                                            @endforeach],
                                        title: {
                                            text: null
                                        }
                                    },
                                    yAxis: {
                                        min: 0,
                                        title: {
                                            text: 'Number',
                                            align: 'high'
                                        },
                                        labels: {
                                            overflow: 'justify'
                                        }
                                    },
                                    tooltip: {
                                        valueSuffix: ' millions'
                                    },
                                    plotOptions: {
                                        bar: {
                                            dataLabels: {
                                                enabled: true
                                            }
                                        }
                                    },
                                    legend: {
                                        layout: 'vertical',
                                        align: 'right',
                                        verticalAlign: 'top',
                                        x: -40,
                                        y: 80,
                                        floating: true,
                                        borderWidth: 1,
                                        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                                        shadow: true
                                    },
                                    credits: {
                                        enabled: false
                                    },
                                    series: [{
                                        name: 'County Level',
                                        data: [
                                            @foreach($counties as $county)
                                                @php($number = rand(50,300))
                                            {{$number}},
                                            @endforeach
                                            ]
                                    }, {
                                        name: 'Sub County Level',
                                        data: [
                                            @foreach($counties as $county)
                                                @php($number = rand(50,300))
                                            {{$number}},
                                            @endforeach
                                        ]
                                    }, ]
                                });
                            </script>






                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- /page content -->



@endsection
@extends('theme.default')

@section('content')



    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Dashboard</h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <!-- top tiles -->
            <div class="row tile_count">
                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-list"></i> Planned Activities</span>
                    <div class="count">337</div>
                    <span class="count_bottom">Activities for 2018-2019</span>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-money"></i> Cost Requirements</span>
                    <div class="count">Ksh.285,336,756</div>
                    <span class="count_bottom">Total planned budget for the 2018-2019</span>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-question-circle-o"></i> Funding Gap</span>
                    <div class="count">38%</div>
                    <span class="count_bottom">Funding gap 2018-2019</span>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-angle-right"></i> Completed Tasks</span>
                    <div class="count">20</div>
                    <span class="count_bottom">Completed tasks</span>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                    <span class="count_top"><i class="fa fa-bar-chart"></i> % Targets met</span>
                    <div class="count">30%</div>
                    <span class="count_bottom">Targets met</span>
                </div>
            </div>
            <!-- /top tiles -->

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Your Tasks</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="col-md-12">
                            <span class="label label-default">Stopped</span>
                            <span class="label label-info">Future</span>
                            <span class="label label-success">On time</span>
                            <span class="label label-warning">Warning</span>
                            <span class="label label-danger">Overdue</span>
                            <span class="badge bg-green">{{count($usertasks)}}</span>
                        </div>


                        <div class="x_content">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                <tr><th>Task</th><th>Progress</th><th>Start Date</th><th>End Date</th><th>Duration</th></tr>
                                </thead>
                                <tbody>
                                @foreach ($usertasks as $usertask)
                                    <tr><td>{{$usertask->task->task_name}}</td><td>
                                            @if(empty($usertask->task->taskreportings->percentage_progress))
                                                0%
                                            @endif
                                            {{--$usertask->task->taskreportings->percentage_progress--}}</td><td>{{$usertask->task->start_date}}</td><td>{{$usertask->task->end_date}}</td><td>Duration</td></tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>MES Indicators</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>


                        <div class="x_content">
                            <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>



                            <script type="text/javascript">

                                // Build the chart
                                Highcharts.chart('container', {
                                    chart: {
                                        plotBackgroundColor: null,
                                        plotBorderWidth: null,
                                        plotShadow: false,
                                        type: 'pie'
                                    },
                                    title: {
                                        text: 'MES indicator performance'
                                    },
                                    tooltip: {
                                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                    },
                                    plotOptions: {
                                        pie: {
                                            allowPointSelect: true,
                                            cursor: 'pointer',
                                            dataLabels: {
                                                enabled: false
                                            },
                                            showInLegend: true
                                        }
                                    },
                                    series: [{
                                        name: 'Brands',
                                        colorByPoint: true,
                                        data: [{
                                            name: 'Theatre lot',
                                            y: 61.41,
                                            sliced: true,
                                            selected: true
                                        }, {
                                            name: 'MRI Equipment',
                                            y: 11.84
                                        }, {
                                            name: 'Radio therapy equipment',
                                            y: 10.85
                                        }, {
                                            name: 'Chemotherapy equipment',
                                            y: 4.67
                                        }, {
                                            name: 'Mammogram equipment',
                                            y: 4.18
                                        }, {
                                            name: 'Renal unit equipment',
                                            y: 7.05
                                        }]
                                    }]
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Division Performance</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>


                        <div class="x_content">
                            <div id="mypie" style="min-width: 210px; height: 400px; margin: 0 auto"></div>
                            <script type="text/javascript">

                                Highcharts.chart('mypie', {
                                    chart: {
                                        plotBackgroundColor: null,
                                        plotBorderWidth: 0,
                                        plotShadow: false
                                    },
                                    title: {
                                        text: 'Division<br>performance<br>2018/2019',
                                        align: 'center',
                                        verticalAlign: 'middle',
                                        y: 40
                                    },
                                    tooltip: {
                                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                    },
                                    plotOptions: {
                                        pie: {
                                            dataLabels: {
                                                enabled: true,
                                                distance: -50,
                                                style: {
                                                    fontWeight: 'bold',
                                                    color: 'white'
                                                }
                                            },
                                            startAngle: -90,
                                            endAngle: 90,
                                            center: ['50%', '75%']
                                        }
                                    },
                                    series: [{
                                        type: 'pie',
                                        name: 'Browser share',
                                        innerSize: '50%',
                                        data: [
                                            ['Policy and Planning', 58.9],
                                            ['Health Financing', 13.29],
                                            ['Monitoring Evaluation, Health research development and informatic', 13],


                                        ]
                                    }]
                                });


                            </script>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Sources of funding</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>


                        <div class="x_content">
                            <div id="mycolumn" style="min-width: 310px; height: 400px; margin: 0 auto"></div>



                            <script type="text/javascript">

                                Highcharts.chart('mycolumn', {
                                    chart: {
                                        type: 'column'
                                    },
                                    title: {
                                        text: 'Sources of funding'
                                    },
                                    subtitle: {
                                        text: ''
                                    },
                                    xAxis: {
                                        categories: [
                                            'World Bank',
                                            'WHO',
                                            'UNICEF',
                                            'UNFPA',
                                            'GOK',
                                            'USAID',
                                            'PARTNERS',
                                            'PALLADIUM',
                                            'JIKA',
                                            'KfW',
                                            'CHAI',
                                            'MOH'
                                        ],
                                        crosshair: true
                                    },
                                    yAxis: {
                                        min: 0,
                                        title: {
                                            text: 'Amount (Ksh.)'
                                        }
                                    },
                                    tooltip: {
                                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                        '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                                        footerFormat: '</table>',
                                        shared: true,
                                        useHTML: true
                                    },
                                    plotOptions: {
                                        column: {
                                            pointPadding: 0.2,
                                            borderWidth: 0
                                        }
                                    },
                                    series: [{
                                        name: 'Funding Source',
                                        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

                                    }, ]
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

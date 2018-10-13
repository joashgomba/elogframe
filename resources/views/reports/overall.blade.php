@extends('theme.default')


@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Overall MES Indicator Category Report</h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Generate Report</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">


                            <div class="row">

                                <table class="table table-striped jambo_table bulk_action">
                                  <thead>
                                    <tr><th colspan="2">{{$indicatorcategory->category}} indicators in {{$county->county}} County</th> </tr>
                                  </thead>
                                    <tbody>
                                    <tr><td>Financial Year</td><td>{{$rollingplan->start_year}} - {{$rollingplan->end_year}}</td></tr>
                                    <tr><td>Quarter</td><td>Q{{$quarter}}</td></tr>
                                    </tbody>

                                </table>

                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                    <tr><th>Indicator</th><th>County</th><th>Sub county</th></tr>
                                    </thead>

                                    <tbody>

                                    @foreach ($mesindicators as $mesindicator)
                                        @php($number = rand(50,400))
                                        @php($number2 = rand(50,400))
                                        <tr><td>{{$mesindicator->indicator_name}}</td><td>{{$number}}</td><td>{{$number2}}</td></tr>
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
                            <h2>County MES Indicator Category Tracking</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                            </ul>
                            <div class="clearfix"></div>
                        </div>


                        <div class="x_content">

                            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>



                            <script type="text/javascript">

                                Highcharts.chart('container', {
                                    chart: {
                                        type: 'column'
                                    },
                                    title: {
                                        text: '{{$indicatorcategory->category}} indicators in {{$county->county}} County'
                                    },
                                    subtitle: {
                                        text: 'Financial year {{$rollingplan->start_year}} - {{$rollingplan->end_year}} Q{{$quarter}}'
                                    },
                                    xAxis: {
                                        categories: [
                                            @foreach ($mesindicators as $mesindicator)
                                               '{{$mesindicator->indicator_name}}',
                                            @endforeach

                                        ],
                                        crosshair: true
                                    },
                                    yAxis: {
                                        min: 0,
                                        title: {
                                            text: 'Number'
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
                                        name: 'County',
                                        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6]

                                    }, {
                                        name: 'Sub county',
                                        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0]

                                    }]
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
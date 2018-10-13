@extends('theme.default')


@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage MES Indicator Reporting</h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Show MES indicator Report</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">

                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('mesindicatortrackings.index') }}"> Back</a>
                                    </div>
                                </div>
                            </div>


                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                            <strong>Reporting Date:</strong>
                                            {{ $mesindicatortracking->reporting_date }}
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                            <strong>Financial Year:</strong>

                                            {{$mesindicatortracking->rollingplan->start_year}} - {{$mesindicatortracking->rollingplan->end_year}}

                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                            <strong>Quarter:</strong>

                                                @if ($mesindicatortracking->quarter==1) Q1 @endif
                                                @if ($mesindicatortracking->quarter==2) Q2 @endif
                                                @if ($mesindicatortracking->quarter==3) Q3 @endif
                                                @if ($mesindicatortracking->quarter==4) Q3 @endif

                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                            <strong>County:</strong>


                                            {{$mesindicatortracking->county->county}}

                                        </div>

                                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                            <strong>Indicator Category:</strong>

                                            {{$mesindicatortracking->indicatorcategory->category}}

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">

                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Indicator</th>
                                                    <th>County Value</th>
                                                    <th>Sub-county Value</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach ($trackedindicators as $trackedindicator)
                                                    <tr><td>{{$trackedindicator->mesindicator->indicator_name}}</td>
                                                        <td>{{$trackedindicator->county_value}}</td>
                                                        <td>{{$trackedindicator->subcounty_value}}</td></tr>
                                                @endforeach
                                                </tbody>

                                            </table>


                                        </div>

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
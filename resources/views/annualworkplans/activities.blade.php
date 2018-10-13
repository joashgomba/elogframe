@if($errormessage != '')
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong>Whoops!</strong> {{$errormessage}}

    </div>
@endif

@if($successmessage != '')
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
       {{$successmessage}}

    </div>
@endif

<table class="table table-striped jambo_table">
    <thead>
    <tr>
        <th colspan="8">&nbsp;</th>
        <th colspan="2">On budget funds</th>
        <th colspan="2">Off budget funds</th>
        <th>&nbsp;</th>
    </tr>


    <tr>

        <th>Result Area</th>
        <th>Main Activities</th>
        <th>Outputs</th>
        <th>Performance Indicator(s)</th>
        <th>Target Output</th>
        <th>Means of verification</th>
        <th>{{ $annualworkplan->rollingplan->start_year }} - {{ $annualworkplan->rollingplan->end_year }} Quarter</th>
        <th>Cost</th>
        <th>Amount (Ksh)</th>
        <th>Source of funding</th>
        <th>Amount (Ksh)</th>
        <th>Source of funding</th>
        <th>Gap (Ksh)</th>
    </tr>
    </thead>
    <tbody>

    @foreach($mainactivities as $mainactivity)
        <tr>
            <td>{{$mainactivity->resultarea->result_area}}</td>
            <td>{{$mainactivity->activity_name}}</td>
            <td>
                @foreach($mainactivity->expectedoutputs as $output)
                    {{$output->output}}
                @endforeach
            </td>
            <td>
                @foreach($mainactivity->performanceindicators as $performanceindicator)
                    {{$performanceindicator->indicator}}
                @endforeach
            </td>
            <td>@foreach($mainactivity->performanceindicators as $performanceindicator)
                    {{$performanceindicator->target_output}}
                @endforeach</td>
            <td>@foreach($mainactivity->performanceindicators as $performanceindicator)
                    {{$performanceindicator->means_of_verification}}
                @endforeach</td>
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
            <td>{{$mainactivity->cost_requirements}}</td>
            <td>{{$mainactivity->on_budget_amount}}</td>
            <td>@foreach($mainactivity->sourcesoffunding as $sourcesoffunding)
                    {{$sourcesoffunding->fund_name}}
                @endforeach</td>
            <td>{{$mainactivity->off_budget_amount}}</td>
            <td>@foreach($mainactivity->sourcesoffunding as $sourcesoffunding)
                    {{$sourcesoffunding->fund_name}}
                @endforeach</td>
            <td>{{$mainactivity->finding_gap}}</td>
        </tr>

    @endforeach



    </tbody>

</table>
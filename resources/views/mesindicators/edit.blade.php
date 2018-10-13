@extends('theme.default')


@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage MES Indicators</h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit MES Indicator</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">

                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('mesindicators.index') }}"> Back</a>
                                    </div>
                                </div>
                            </div>


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



                            <form action="{{ route('mesindicators.update',$mesindicator->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="form-group">
                                        <strong>Indicator Name:</strong>
                                        <input type="text" name="indicator_name" value="{{ $mesindicator->indicator_name }}" class="form-control" placeholder="Indicator Name">
                                    </div>
                                    <div class="form-group">
                                        <strong>Category:</strong>

                                        <select name="department_id" id="department_id" class="form-control">
                                            <option value="">Select Category</option>
                                            @foreach($indicatorcategories as $indicatorcategory)
                                                <option value="{{$indicatorcategory->id}}" @if ($indicatorcategory->id==$mesindicator->indicatorcategory_id) selected="selected" @endif >{{$indicatorcategory->category}}</option>

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
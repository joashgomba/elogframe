@extends('theme.default')


@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage Units</h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Unit</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">

                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('units.index') }}"> Back</a>
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



                            <form action="{{ route('units.update',$unit->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="form-group">
                                        <strong>Unit Name:</strong>
                                        <input type="text" name="unit_name" value="{{ $unit->unit_name }}" class="form-control" placeholder="Unit Name">
                                    </div>
                                    <div class="form-group">
                                        <strong>Division:</strong>

                                        <select name="division_id" id="division_id" class="form-control">
                                            <option value="">Select Division</option>
                                            @foreach($divisions as $division)
                                                <option value="{{$division->id}}" @if ($division->id==$unit->division_id) selected="selected" @endif >{{$division->division_name}}</option>

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
@extends('theme.default')


@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage Divisions</h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit Division</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">

                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('divisions.index') }}"> Back</a>
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



                            <form action="{{ route('divisions.update',$division->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">

                                    <div class="form-group">
                                        <strong>Division Name:</strong>
                                        <input type="text" name="division_name" value="{{ $division->division_name }}" class="form-control" placeholder="Division Name">
                                    </div>
                                    <div class="form-group">
                                        <strong>Depatment:</strong>

                                        <select name="department_id" id="department_id" class="form-control">
                                            <option value="">Select Department</option>
                                            @foreach($departments as $department)
                                                <option value="{{$department->id}}" @if ($department->id==$division->department_id) selected="selected" @endif >{{$department->department_name}}</option>

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
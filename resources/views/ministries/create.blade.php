@extends('theme.default')


@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage Ministries</h3>
                </div>


            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Create Ministry</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">

                                    <div class="pull-right">
                                        <a class="btn btn-primary" href="{{ route('ministries.index') }}"> Back</a>
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


                            {!! Form::open(array('route' => 'ministries.store','method'=>'POST')) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name<span class="required">*</span>:</strong>
                                        {!! Form::text('name', null, array('placeholder' => 'Name','required'=>'required','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Location:</strong>
                                        {!! Form::text('location', null, array('placeholder' => 'Location','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        <strong>Telephone:</strong>
                                        {!! Form::text('telephone', null, array('placeholder' => 'Telephone','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        <strong>Postal Address:</strong>
                                        {!! Form::text('postal_address', null, array('placeholder' => 'Postal Address','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        <strong>Postal Code:</strong>
                                        {!! Form::text('postal_code', null, array('placeholder' => 'Postal Code','class' => 'form-control')) !!}
                                    </div>
                                    <div class="form-group">
                                        <strong>City:</strong>
                                        {!! Form::text('city', null, array('placeholder' => 'City','class' => 'form-control')) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->



@endsection
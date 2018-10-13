@extends('theme.default')


@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage Counties</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Counties</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">

                                    <div class="pull-right">
                                        @can('ministry-create')
                                            <a class="btn btn-success" href="{{ route('counties.create') }}"> Create New County</a>
                                        @endcan
                                    </div>
                                </div>
                            </div>


                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    {{ $message }}
                                </div>
                            @endif


                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>County</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($counties as $county)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $county->county }}</td>
                                        <td>{{ $county->lat }}</td>
                                        <td>{{ $county->long }}</td>
                                        <td>
                                            <form id="action-form" action="{{ route('counties.destroy',$county->id) }}" method="POST">
                                                <a class="text-info" href="{{ route('counties.show',$county->id) }}" style="font-size:24px"> <i class="fa fa-eye"></i></a>
                                                @can('ministry-edit')
                                                    <a class="text-success" href="{{ route('counties.edit',$county->id) }}" style="font-size:24px"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                @csrf
                                                @method('DELETE')
                                                @can('ministry-delete')


                                                    <!--<a class="text-danger delete" href="{{ route('counties.destroy',$county->id) }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('action-form').submit();" style="font-size:24px"><i class="fa fa-trash"></i></a>-->


                                                @endcan
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>


                            {!! $counties->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->



@endsection
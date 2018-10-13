@extends('theme.default')


@section('content')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage Roles</h3>
                </div>

                <!--<div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>-->
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Roles</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">

                                    <div class="pull-right">
                                        @can('role-create')
                                            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
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

                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                            <th>No</th>
                                            <th>Name</th>
                                            <th width="280px">Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($roles as $key => $role)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td>
                                                <form id="action-form" action="{{ route('roles.destroy',$role->id) }}" method="POST">
                                                <a class="text-info" href="{{ route('roles.show',$role->id) }}" style="font-size:24px"> <i class="fa fa-eye"></i></a>
                                                @can('role-edit')
                                                    <a class="text-success" href="{{ route('roles.edit',$role->id) }}" style="font-size:24px"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('role-delete')


                                                        <a class="text-danger delete" href="{{ route('roles.destroy',$role->id) }}"
                                                           onclick="event.preventDefault();
                                                     document.getElementById('action-form').submit();" style="font-size:24px"><i class="fa fa-trash"></i></a>


                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach
                                </table>


                            {!! $roles->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->



@endsection
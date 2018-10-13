@extends('theme.default')


@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Users Management</h3>
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
                            <h2>Users</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">

                                    <div class="pull-right">

                                        <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>

                                    </div>
                                </div>
                            </div>


                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Roles</th>
                                            <th width="280px">Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($data as $key => $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if(!empty($user->getRoleNames()))
                                                    @foreach($user->getRoleNames() as $v)
                                                        <label class="badge badge-success">{{ $v }}</label>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <form id="action-form" action="{{ route('users.destroy',$user->id) }}" method="POST">
                                                <a class="text-info" href="{{ route('users.show',$user->id) }}" style="font-size:24px"> <i class="fa fa-eye"></i></a>
                                               <a class="text-success" href="{{ route('users.edit',$user->id) }}" style="font-size:24px"><i class="fa fa-edit"></i></a>

                                                @csrf
                                                @method('DELETE')



                                                    <a class="text-danger delete" href="{{ route('users.destroy',$user->id) }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('action-form').submit();" style="font-size:24px"><i class="fa fa-trash"></i></a>



                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>


                            {!! $data->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->



@endsection
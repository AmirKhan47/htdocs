@extends('admin/layout')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        {{-- <small>List</small> --}}
      </h1>
      {{-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol> --}}
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> Manage Users</h3>
            </div>
            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Users List</a></li>
                <li><a href="#tab_2" data-toggle="tab">Add New User</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->get('success'))
                        <div class="alert alert-info">
                            {{ session()->get('success') }}  
                        </div><br />
                    @endif
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Name</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Password</th>
                          <th>Created Date</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->username }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->password }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>
                                    <a class="btn btn-info" href="/admin/update_user/{{ $data->admin_id }}">Edit</a>
                                    <a class="btn btn-danger" href="/admin/delete_user/{{ $data->admin_id }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <form class="form-horizontal" method="POST" action="/admin/user" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(session()->get('success'))
                                <div class="alert alert-info">
                                    {{ session()->get('success') }}  
                                </div><br />
                            @endif
                            <div class="form-group">
                              <label for="" class="col-sm-2 control-label">Name</label>

                              <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" placeholder="Name" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-sm-2 control-label">Email</label>

                              <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" placeholder="Email" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-sm-2 control-label">Username</label>

                              <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" placeholder="Username" required="required">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="" class="col-sm-2 control-label">Password</label>

                              <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" placeholder="Password" required="required">
                              </div>
                            </div>
                            {{-- <div class="form-group">
                              <label for="inputPassword3" class="col-sm-2 control-label">Image</label>

                              <div class="col-sm-10">
                                <input type="file" name="image" class="form-control" id="inputPassword3">
                              </div>
                            </div> --}}
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" name="submit" value="submit" class="btn btn-info pull-right">Submit</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
            <!-- /.tab-content -->
            </div>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
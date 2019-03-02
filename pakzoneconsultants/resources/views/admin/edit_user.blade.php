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
              <h3 class="box-title"> Edit User</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="POST" action="/admin/update_user" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="admin_id" value="{{$data->admin_id}}">
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
                            <input type="text" name="name" value="{{ $data->name }}" class="form-control" placeholder="Name" required="required">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-sm-2 control-label">Email</label>

                          <div class="col-sm-10">
                            <input type="email" name="email" value="{{ $data->email }}" class="form-control" placeholder="Email" required="required">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-sm-2 control-label">Username</label>

                          <div class="col-sm-10">
                            <input type="text" name="username" value="{{ $data->username }}" class="form-control" placeholder="Username" required="required">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="" class="col-sm-2 control-label">Password</label>

                          <div class="col-sm-10">
                            <input type="password" name="password" value="{{ $data->password }}" class="form-control" placeholder="Password" required="required">
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
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
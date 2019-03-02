@extends('admin/layout')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
        <small>Update</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Horizontal Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="POST" action="/admin/profile" enctype="multipart/form-data">
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
                        <input type="text" name="name" class="form-control" id="" value="{{ $data->name }}" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Email</label>

                      <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="" value="{{ $data->email }}" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Username</label>

                      <div class="col-sm-10">
                        <input type="text" name="username" class="form-control" id="" value="{{ $data->username }}" placeholder="Username">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="" class="col-sm-2 control-label">Password</label>

                      <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="" value="{{ $data->password }}" placeholder="Password">
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
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
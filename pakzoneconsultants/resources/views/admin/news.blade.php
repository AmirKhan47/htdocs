@extends('admin/layout')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            News
            {{-- <small>Files</small> --}}
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
                        <h3 class="box-title">Manage News</h3>
                    </div>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">News List</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Add New News</a></li>
                        </ul>
                        <div class="tab-content">
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
                            <div class="tab-pane active" id="tab_1">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                      <th>News Headline</th>
                                      <th>News Description</th>
                                      <th>Created Date</th>
                                      {{-- <th>Download</th> --}}
                                      {{-- <th>Delete</th> --}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $data)
                                        <tr>
                                            <td>{{ $data->news_headline }}</td>
                                            <td>{{ $data->news_description }}</td>
                                            <td>{{ $data->created_at }}</td>
                                            {{-- <td> --}}
                                                {{-- <a class="btn btn-info" href="/uploads/files/{{$data->file_name}}" download>Download</a> --}}
                                                {{-- <a href="/storage/uploads/files/{{$file->file_name}}" class="btn btn-warning btn-sm" download><i class="fa fa-download"></i></a> --}}
                                            {{-- </td> --}}
                                            {{-- <td><a class="btn btn-danger" href="/admin/delete_user/{{ $data->admin_id }}">Delete</a></td> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                <form class="form-horizontal" method="POST" action="/admin/news" enctype="multipart/form-data">
                                    @csrf
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="" class="col-sm-2 control-label">News Headline</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="news_headline" class="form-control" id="" required="required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-2 control-label">News Description</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="news_description" class="form-control" id="" required="required">
                                            </div>
                                        </div>
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
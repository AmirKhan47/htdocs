@extends('admin/layout')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Header
        {{-- <small>Preview</small> --}}
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
              <h3 class="box-title">Header Settings</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
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

                    <div class="row">

                        <div class="col-md-4">
                            <form method="POST" action="/admin/header">
                                @csrf
                                <input type="hidden" name="image_id" value="{{ $images[0]['image_id'] }}">
                                <div class="form-group">
                                    <label for="">Header Email</label>
                                    <input type="text" class="form-control" name="header_email" id="" value="{{ $images[0]['header_email'] }}" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="">Header Contact</label>
                                    <input type="text" class="form-control" name="header_contact" id="" value="{{ $images[0]['header_contact'] }}" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="">Header Facebook Link</label>
                                    <input type="text" class="form-control" name="header_facebook_link" id="" value="{{ $images[0]['header_facebook_link'] }}" required="required">
                                </div>
                                <button type="submit" name="submit" value="submit" class="btn btn-info">
                                    Submit
                                </button>
                            </form>
                        </div>

                    </div>

                </div>
                <!-- /.box-body -->
                {{-- <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div> --}}
                <!-- /.box-footer -->
            {{-- </form> --}}
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
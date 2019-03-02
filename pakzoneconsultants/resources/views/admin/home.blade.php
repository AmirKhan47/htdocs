@extends('admin/layout')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Home Page
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
              <h3 class="box-title">Home Page Settings</h3>
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
                            <form method="POST" action="/admin/home">
                                @csrf
                                <input type="hidden" name="image_id" value="{{ $images[0]['image_id'] }}">
                                <div class="form-group">
                                    <label for="">Introduction</label>
                                    <textarea class="form-control" rows="5" name="introduction" required="required">{{ $images[0]['introduction'] }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Mission</label>
                                    <textarea class="form-control" rows="5" name="mission" required="required">{{ $images[0]['mission'] }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Vision</label>
                                    <textarea class="form-control" rows="5" name="vision" required="required">{{ $images[0]['vision'] }}</textarea>
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
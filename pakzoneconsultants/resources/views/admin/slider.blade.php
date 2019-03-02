@extends('admin/layout')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sliders
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
              <h3 class="box-title">Manage Sliders</h3>
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
                    
                    @if($images != NULL)
                        <div class="row">
                            {{-- @foreach($images as $image) --}}
                                <div class="col-md-4">
                                    <div class="card">
                                        <img height="100%" width="100%" src="{{ asset('uploads/slider_images/'.$images[0]['image1_name'].'') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img height="100%" width="100%" src="{{ asset('uploads/slider_images/'.$images[0]['image2_name'].'') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img height="100%" width="100%" src="{{ asset('uploads/slider_images/'.$images[0]['image3_name'].'') }}" alt="">
                                    </div>
                                </div>
                            {{-- @endforeach --}}
                        </div>
                    @endif

                    <br>

                    <div class="row">

                        <div class="col-md-4">
                            <form method="POST" action="/admin/slider" id="" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="image_id" value="{{ $images[0]['image_id'] }}">
                                <input type="hidden" name="old_image1_name" value="{{ $images[0]['image1_name'] }}">
                                <div class="form-group">
                                    <label for="">Slider Image 1</label>
                                    <input type="file" name="image1_name" id="" required="required">
                                </div>
                                <button id="" type="submit" name="submit1" value="submit1" class="btn btn-info">
                                    Submit
                                </button>
                            </form>
                            <br>
                            <form method="POST" action="/admin/slider" id="">
                                @csrf
                                <input type="hidden" name="image_id" value="{{ $images[0]['image_id'] }}">
                                <div class="form-group">
                                    <label for="">Label</label>
                                    <input type="text" class="form-control" name="label1" value="{{ $images[0]['label1'] }}" id="" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="">Text</label>
                                    <input type="text" class="form-control" name="text1" value="{{ $images[0]['text1'] }}" id="" required="required">
                                </div>
                                <button id="" type="submit" name="submit1_text" value="submit1_text" class="btn btn-info">
                                    Submit
                                </button>
                            </form>
                        </div>

                        <div class="col-md-4">
                            <form method="POST" action="/admin/slider" id="" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="image_id" value="{{ $images[0]['image_id'] }}">
                                <input type="hidden" name="old_image2_name" value="{{ $images[0]['image2_name'] }}">
                                <div class="form-group">
                                    <label for="file_slide_one">Slider Image 2</label>
                                    <input type="file" name="image2_name" id="" required="required">
                                </div>
                                <button id="" type="submit2" name="submit2" value="submit2" class="btn btn-info">
                                    Submit
                                </button>
                            </form>
                            <br>
                            <form method="POST" action="/admin/slider" id="">
                                @csrf
                                <input type="hidden" name="image_id" value="{{ $images[0]['image_id'] }}">
                                <div class="form-group">
                                    <label for="">Label</label>
                                    <input type="text" class="form-control" name="label2" value="{{ $images[0]['label2'] }}" id="" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="">Text</label>
                                    <input type="text" class="form-control" name="text2" value="{{ $images[0]['text2'] }}" id="" required="required">
                                </div>
                                <button id="" type="submit" name="submit2_text" value="submit2_text" class="btn btn-info">
                                    Submit
                                </button>
                            </form>
                        </div>

                        <div class="col-md-4">
                            <form method="POST" action="/admin/slider" id="" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="image_id" value="{{ $images[0]['image_id'] }}">
                                <input type="hidden" name="old_image3_name" value="{{ $images[0]['image3_name'] }}">
                                <div class="form-group">
                                    <label for="file_slide_one">Slider Image 3</label>
                                    <input type="file" name="image3_name" id="" required="required">
                                </div>
                                <button id="" type="submit" name="submit3" value="submit3" class="btn btn-info">
                                    Submit
                                </button>
                            </form>
                            <br>
                            <form method="POST" action="/admin/slider" id="">
                                @csrf
                                <input type="hidden" name="image_id" value="{{ $images[0]['image_id'] }}">
                                <div class="form-group">
                                    <label for="">Label</label>
                                    <input type="text" class="form-control" name="label3" value="{{ $images[0]['label3'] }}" id="" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="">Text</label>
                                    <input type="text" class="form-control" name="text3" value="{{ $images[0]['text3'] }}" id="" required="required">
                                </div>
                                <button id="" type="submit" name="submit3_text" value="submit3_text" class="btn btn-info">
                                    Submit
                                </button>
                            </form>
                        </div>

                        {{-- <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Image 1</label>
                          <div class="col-sm-10">
                            <input type="file" name="image1" class="form-control" id="">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Image 2</label>
                          <div class="col-sm-10">
                            <input type="file" name="image2" class="form-control" id="">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Image 3</label>
                          <div class="col-sm-10">
                            <input type="file" name="image3" class="form-control" id="">
                          </div>
                        </div> --}}

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
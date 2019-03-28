@extends('layouts/dashboard')
@section('title', 'Slider Images')
@section('content')

    <section class="py-3">
        <div class="card card-info">
            <div class="card-header">             
                <h3 class="card-title">Slider Images</h3>           
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>Image ID</td>
                            <td>Image Preview</td>
                            <td>Image Name </td>
                            <td>Last Updated at</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($images as $image)
                            <tr>
                                <td>{{$image->id}}</td>
                                <td>
                                    <img height="150" width="150" class="img-fluid img-thumbnail" src="/storage/uploads/slider_images/{{$image->image_name}}" alt="">
                                </td>
                                <td>{{$image->image_name}}</td>
                                <td>{{$image->updated_at}}</td>
                                <td>
                                   
                                    <form action="/sliderImages/{{$image->id}}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        {{method_field('PATCH')}}
                                        <input type="file" name="slider_image">
                                        <input type="submit" value="Update" class="btn btn-success btn-sm">
                                    </form>
                                       
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
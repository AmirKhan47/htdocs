@extends('layouts/dashboard')
@section('title', 'Files')
@section('content')

    <section class="py-3">
        <div class="card elevation-2 card-info">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="card-title">All Files</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="/files/create" class="btn btn-dark elevation-1 btn-sm float-right">Create File</a>
                    </div>
                </div>
                
                
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="files_dataTable" class="table table-bordered table-striped table-sm table-hover">
                    <thead>
                        <tr>
                            <td>File Title</td>
                            <td>File Description</td>
                            <td>File Name</td>
                            <td>File Created by</td>
                            <td>File Created at</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($files as $file)
                        <tr>
                            <td>{{$file->file_title}}</td>
                            <td>{{$file->file_description}}</td>
                            <td>{{$file->file_name}}</td>
                            <td>{{$file->user['name']}}</td>
                            <td>{{$file->created_at}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="/storage/uploads/files/{{$file->file_name}}" class="btn btn-warning btn-sm" download><i class="fa fa-download"></i></a>
                                    </div>
                                    <div class="col-md-6">
                                        <form action="/files/{{$file->id}}" method="POST">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                        </form>
                                    </div>
                                </div>
                                
                                
                            </td>
                        </tr>
                        @endforeach
                        
                       
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
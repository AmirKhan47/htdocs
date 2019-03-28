@extends('layouts/dashboard')
@section('title', 'Add file')
@section('content')

<div class="container-fluid py-3">
    
    <div class="row mx-auto">
        <div class="col-md-12">
            <div class="card card-info elevation-2">
                <div class="card-header">
                    <h3 class="card-title">Add File</h3>
                </div>
                <div class="card-body">
                    <form action="/files" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="file_title">File Title</label>
                            <input class="form-control" type="text" name="file_title" placeholder="Enter file name" required>
                        </div>
            
                        <div class="form-group">
                            <label for="file_description">Description (optional)</label>
                            <textarea id="article-ckeditor" class="form-control" name="file_description" id="file_description" rows="8" placeholder="Add Description"></textarea>
                        </div>
            
                        <div class="form-group">
                            <label for="">Attach File</label>
                            <input type="file" name="file_name" required>
                        </div>
        
                        <input type="submit" class="btn btn-info" value="Add file">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


        
        
    
@endsection
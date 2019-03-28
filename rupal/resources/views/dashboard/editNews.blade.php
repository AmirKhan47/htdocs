@extends('layouts/dashboard')
@section('title', 'Edit News')
@section('content')

<div class="container-fluid py-3">
        
    <div class="row mx-auto">
        <div class="col-md-12">
            <div class="card card-info elevation-2">
                <div class="card-header">
                    <h3 class="card-title">Edit News</h3>
                </div>
                <div class="card-body">
                    <form action="/news/{{$news->id}}" method="POST">
                        {{ method_field('PATCH') }}
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="">News Title</label>
                            <input class="form-control" type="text" name="news_title" value="{{$news->news_headline}}" required>
                        </div>
            
                        <div class="form-group">
                            <label for="">News Description</label>
                            <textarea id="article-ckeditor" class="form-control" name="news_description" id="news_description" rows="5">{{$news->news_description}}</textarea>
                        </div>
            
                        
        
                        <input type="submit" class="btn btn-dark" value="Edit News">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


        
        
    
@endsection
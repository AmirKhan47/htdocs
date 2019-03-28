@extends('layouts/dashboard')
@section('title', 'Add News')
@section('content')

<div class="container-fluid py-3">
    <div class="row mx-auto">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add News</h3>
                </div>
                <div class="card-body">
                    <form action="/news"  method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="news_title">News Headline</label>
                            <input class="form-control" type="text" name="news_title" placeholder="Enter News Headline" required>
                        </div>
            
                        <div class="form-group">
                            <label for="news_description">News Description</label>
                            <textarea id="article-ckeditor" class="form-control" name="news_description" id="news_description" placeholder="Enter News Description" rows="10" required></textarea>
                        </div>
    
                        <input type="submit" class="btn btn-info" value="Add News">
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>


        
        
    
@endsection
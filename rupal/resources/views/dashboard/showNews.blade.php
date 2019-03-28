@extends('layouts/dashboard')
@section('title', 'News')
@section('content')

    <section class="py-3">
        <div class="card elevation-2 card-info">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="card-title">All News</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="/news/create" class="btn btn-dark btn-sm float-right">Create News</a>
                    </div>
                </div>
                
                
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="news_dataTable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <td>News Headline</td>
                            <td>News Description</td>
                            <td>News Created by</td>
                            <td>News Created at</td>
                            <td>Last Updated at</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($newsList as $news)
                            <tr>
                                <td>{{$news->news_headline}}</td>
                                <td>{{$news->news_description}}</td>
                                <td>{{$news->user['name']}}</td>
                                <td>{{$news->created_at}}</td>
                                <td>{{$news->updated_at}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a class="btn btn-info btn-sm" href="/news/{{$news->id}}/edit">Edit</a>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="/news/{{$news->id}}" method="POST">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
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
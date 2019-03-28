@extends('layouts/app')
@section('title')
    Home
@endsection
@section('content')
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($images as $image)
                <div class="carousel-item">
                    <img src="/storage/uploads/slider_images/{{$image->image_name}}" class="d-block w-100" alt="...">
                </div>
            @endforeach

            
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <section style="background-image: linear-gradient(to top, #f4f4f4, #fff);">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4 col-sm-4 py-5 rounded text-justify">
                    <h4>Our Vision</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti autem quod fugit cupiditate modi nulla aliquam, repellendus ullam in blanditiis nisi quae vitae distinctio, iusto, obcaecati alias. Non maxime mollitia numquam, officia quam iste! Doloribus ipsa necessitatibus impedit veniam sit.</p>
                </div>
                <div class="col-md-4 col-sm-4 py-5 rounded text-justify">
                    <h4>Our Mission</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti autem quod fugit cupiditate modi nulla aliquam, repellendus ullam in blanditiis nisi quae vitae distinctio, iusto, obcaecati alias. Non maxime mollitia numquam, officia quam iste! Doloribus ipsa necessitatibus impedit veniam sit.</p>
                </div>
                <div class="col-md-3 offset-md-1 col-sm-3 py-5 rounded border-left">
                    <h4 class="text-left">Latest News</h4>
                    @foreach ($newsList as $news)
                        <div class="p-1 border-bottom mx-auto">
                            <h5 class="text-uppercase">{{$news->news_headline}}</h5>
                            <p>{{$news->news_description}}</p>
                        </div>
                    @endforeach
                    
                </div>
                
            </div>
        </div>
    </section>
        
    
@endsection
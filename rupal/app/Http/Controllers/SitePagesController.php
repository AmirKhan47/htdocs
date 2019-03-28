<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\SliderImage;

class SitePagesController extends Controller
{
    public function index(){
        $title = 'Home';
        $newsList = News::all();
        $images = SliderImage::all();
        // dd($images);
        return view('website.index')->with('newsList', $newsList)->with('images', $images);
    }

    public function products(){
        $title = 'Products';
        return view('website.products')->with('title', $title);
    }

    public function industry(){
        $title = 'Industry';
        return view('website.industry')->with('title', $title);
    }

    public function processAndDesign(){
        $title = 'Process and Design';
        return view('website.processAndDesign')->with('title', $title);
    }

    public function consultants(){
        $title = 'Our Consultants';
        return view('website.consultants')->with('title', $title);
    }

    public function partners(){
        $title = 'Our Partners';
        return view('website.partners')->with('title', $title);
    }

    public function strengths(){
        $title = 'Our Strengths';
        return view('website.strength')->with('title', $title);
    }

    public function gallery(){
        $title = 'Videos and Images';
        return view('website.gallery')->with('title', $title);
    }
}

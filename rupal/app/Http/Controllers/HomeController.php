<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\News;
use App\SliderImage;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $files = File::all()->count();
        $news = News::all()->count();
        $images = SliderImage::all()->count();
        $users = User::all()->count();
        $active = 'dash';
        
        return view('home')
            ->with('files', $files)
            ->with('news', $news)
            ->with('images', $images)
            ->with('users', $users)
            ->with('active', $active);
    }
}

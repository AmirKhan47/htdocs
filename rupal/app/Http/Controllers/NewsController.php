<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $news_list = News::orderBy('created_at', 'desc')->get();
        $active = 'news';
        return view('dashboard.showNews')->with('newsList', $news_list)->with('active', $active);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'news';
        return view('dashboard.createNews')->with('active', $active);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'news_title'       => 'required',
                'news_description' => 'required'
            ]
        );
        $news = new News;
        $news->news_headline = $request->input('news_title');
        $news->news_description = $request->input('news_description');
        $news->user_id = auth()->user()->id;
        $news->save();
        return redirect('/news')->with('success', 'News Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        $active = 'news';
        return view('dashboard.editNews')->with('news', $news)->with('active', $active);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate(
            $request,
            [
                'news_title'     => 'required',
                'news_description'  => 'required'
            ]
        );
        
        $news = News::find($id);
        $news->news_headline = $request->input('news_title');
        $news->news_description = $request->input('news_description');
        $news->save();
        return redirect('/news')->with('success', 'News Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect('/news')->with('success', 'News Deleted Successfully!');
    }
}

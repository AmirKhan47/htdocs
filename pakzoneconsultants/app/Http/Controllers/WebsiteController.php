<?php

namespace App\Http\Controllers;

use App\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = DB::table('sliders')->get();

        $data = DB::table('news')->orderBy('news_id', 'desc')->limit(3)->get();
        // dd($data);
        // exit();

        return view('index', compact('images','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function our_services()
    {
        $images = DB::table('sliders')->get();
        return view('our_services', ['images' => $images]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function our_expertise(Request $request)
    {
        $images = DB::table('sliders')->get();
        return view('our_expertise', ['images' => $images]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function our_strengths()
    {
        $images = DB::table('sliders')->get();
        return view('our_strengths', ['images' => $images]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function contact_us()
    {
        $images = DB::table('sliders')->get();
        return view('contact_us', ['images' => $images]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Website $website)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Website  $website
     * @return \Illuminate\Http\Response
     */
    public function destroy(Website $website)
    {
        //
    }
}

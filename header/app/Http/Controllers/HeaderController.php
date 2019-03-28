<?php

namespace App\Http\Controllers;

use App\Header;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Header::all();
        return view('add_header', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_header');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->input('submit'))
        {
            $request->validate([
                'header_name' => 'required|unique:headers',
            ]);
            $header = new Header;
            $header->header_name = $request->input('header_name');
            // $news->header_description = $request->input('header_description');
            $header->save();
            return redirect('/headers')->with('success', 'Header Name Created Successfully!');
        }
        if ($request->input('submit1'))
        {
            $header = Header::all();
            foreach ($header as $key => $detail)
            {
                $detail->header_amount = $request->input('header_amount')[$key];
                $detail->save();
            }
            return redirect('/headers')->with('success', 'Header Amount Added Successfully!');
        }
        if ($request->input('submit2'))
        {
            $header = Header::all();
            foreach ($header as $key => $detail)
            {
                $detail->header_amount = $request->input('header_amount')[$key];
                $detail->save();
            }
            return redirect('/headers')->with('success', 'Header Amount Updated Successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function show(Header $header)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function edit(Header $header)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Header $header)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function destroy(Header $header)
    {
        //
    }
}

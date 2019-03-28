<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;
use Auth;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate(
        // [
        //     'name' => 'required|string|min:3|max:50',
        //     'urdu_name' => 'required|string|min:3|max:50',
        //     'category' => 'required',
        //     'type' => 'required',
        //     'status' => 'required',
        // ]);
        // echo "<pre>";
        // print_r ($request->all());
        // echo "</pre>";
        // exit();
        $stock = new Stock;
        $stock->header_id = request('header_id');
        $stock->stock = request('stock');
        $stock->status = request('status');
        $stock->created_by = Auth::id();
        $stock->save();
        // return back()->with('success','Record Added Successfully.');
        echo '1';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}

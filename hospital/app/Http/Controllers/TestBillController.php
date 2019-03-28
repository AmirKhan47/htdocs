<?php

namespace App\Http\Controllers;

use App\TestBill;
use Illuminate\Http\Request;

class TestBillController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TestBill  $testBill
     * @return \Illuminate\Http\Response
     */
    public function show(TestBill $testBill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TestBill  $testBill
     * @return \Illuminate\Http\Response
     */
    public function edit(TestBill $testBill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TestBill  $testBill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestBill $testBill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TestBill  $testBill
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestBill $testBill)
    {
        //
    }
}

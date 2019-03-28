<?php

namespace App\Http\Controllers;

use App\TestCommission;
use Illuminate\Http\Request;

class TestCommissionController extends Controller
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
     * @param  \App\TestCommission  $testCommission
     * @return \Illuminate\Http\Response
     */
    public function show(TestCommission $testCommission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TestCommission  $testCommission
     * @return \Illuminate\Http\Response
     */
    public function edit(TestCommission $testCommission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TestCommission  $testCommission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestCommission $testCommission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TestCommission  $testCommission
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestCommission $testCommission)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\OperationBill;
use Illuminate\Http\Request;

class OperationBillController extends Controller
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
     * @param  \App\OperationBill  $operationBill
     * @return \Illuminate\Http\Response
     */
    public function show(OperationBill $operationBill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OperationBill  $operationBill
     * @return \Illuminate\Http\Response
     */
    public function edit(OperationBill $operationBill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OperationBill  $operationBill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OperationBill $operationBill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OperationBill  $operationBill
     * @return \Illuminate\Http\Response
     */
    public function destroy(OperationBill $operationBill)
    {
        //
    }
}

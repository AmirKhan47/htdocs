<?php

namespace App\Http\Controllers;

use App\OtherExpense;
use Illuminate\Http\Request;
use Auth;

class OtherExpenseController extends Controller
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
        $otherexpense = new OtherExpense;
        $otherexpense->header_id = request('header_id');
        $otherexpense->expense = request('expense');
        $otherexpense->income = request('income');
        $otherexpense->naam = request('naam');
        $otherexpense->jama = request('jama');
        $otherexpense->status = request('status');
        $otherexpense->created_by = Auth::id();
        $otherexpense->save();
        // return back()->with('success','Record Added Successfully.');
        echo '1';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OtherExpense  $otherExpense
     * @return \Illuminate\Http\Response
     */
    public function show(OtherExpense $otherExpense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OtherExpense  $otherExpense
     * @return \Illuminate\Http\Response
     */
    public function edit(OtherExpense $otherExpense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OtherExpense  $otherExpense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OtherExpense $otherExpense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OtherExpense  $otherExpense
     * @return \Illuminate\Http\Response
     */
    public function destroy(OtherExpense $otherExpense)
    {
        //
    }
}

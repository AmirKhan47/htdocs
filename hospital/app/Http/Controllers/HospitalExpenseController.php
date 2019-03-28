<?php

namespace App\Http\Controllers;

use App\HospitalExpense;
use Illuminate\Http\Request;
use Auth;

class HospitalExpenseController extends Controller
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
        $hospitalexpense = new HospitalExpense;
        $hospitalexpense->header_id = request('header_id');
        $hospitalexpense->expense = request('expense');
        $hospitalexpense->naam = request('naam');
        $hospitalexpense->status = request('status');
        $hospitalexpense->created_by = Auth::id();
        $hospitalexpense->save();
        // return back()->with('success','Record Added Successfully.');
        echo '1';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HospitalExpense  $hospitalExpense
     * @return \Illuminate\Http\Response
     */
    public function show(HospitalExpense $hospitalExpense)
    {
        // echo $hospitalExpense;
        // return view('admin.headers.daily_report');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HospitalExpense  $hospitalExpense
     * @return \Illuminate\Http\Response
     */
    public function edit(HospitalExpense $hospitalExpense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HospitalExpense  $hospitalExpense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HospitalExpense $hospitalExpense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HospitalExpense  $hospitalExpense
     * @return \Illuminate\Http\Response
     */
    public function destroy(HospitalExpense $hospitalExpense)
    {
        //
    }
}

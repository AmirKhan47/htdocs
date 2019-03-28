<?php

namespace App\Http\Controllers;

use App\Test;
use Auth;
use Illuminate\Http\Request;

class TestController extends Controller
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
        $tests = Test::all();
        return view('admin.tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
        [
            'name' => 'required|string|min:3|max:50',
            'rate' => 'required|numeric|min:0|max:9999999999',
            'category' => 'required',
            'status' => 'required',
        ]);

        $test = new Test;
        $test->name = request('name');
        $test->rate = request('rate');
        $test->category = request('category');
        $test->status = request('status');
        $test->created_by = Auth::id();
        $test->save();

        return back()->with('success','Record Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        return view('admin.tests.edit', compact('test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate(
        [
            'name' => 'required|string|min:3|max:50',
            'rate' => 'required|numeric|min:0|max:9999999999',
            'category' => 'required',
            'status' => 'required',
        ]);

        $test = Test::find($id);
        $test->name = request('name');
        $test->rate = request('rate');
        $test->category = request('category');
        $test->status = request('status');
        $test->updated_by = Auth::id();
        $test->save();
        
        return back()->with('success','Record Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}

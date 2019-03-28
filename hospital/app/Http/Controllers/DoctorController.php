<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Test;
use App\TestCommission;
use Auth;
use Illuminate\Http\Request;

class DoctorController extends Controller
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
        $doctors = Doctor::whereIn('category', ['OPD', 'OPD,Surgeon'])->get();
        return view('admin.doctors.index', compact('doctors'));
    }

    public function category($category = 0)
    {
        if (($category == 'OPD,Surgeon') OR ($category == 'Surgeon'))
        {
            $doctors = Doctor::whereIn('category', ['OPD', 'OPD,Surgeon'])->get();
            return view('admin.doctors.index', compact('doctors'));
        }
        if (($category == 'OPD,Surgeon') OR ($category == 'OPD'))
        {
            $doctors = Doctor::whereIn('category', ['Surgeon', 'OPD,Surgeon'])->get();
            return view('admin.doctors.ot_index', compact('doctors'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tests = Test::all();
        return view('admin.doctors.create', compact('tests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (count($request->category) == 1)
        {
            $categories = $request->category;
            $category = implode (",", $categories);
        }
        if (count($request->category) == 2)
        {
            $categories = $request->category;
            $category = implode (",", $categories);
        }

        $validatedData = $request->validate(
        [
            'name' => 'required|string|min:3|max:50',
            'address' => 'required',
            'designation' => 'required',
            'checkup_commission' => 'required',
            'email' => 'required|email|unique:doctors',
            'fee' => 'required|numeric',
            'type' => 'required',
            'status' => 'required',
            'contact' => 'required|numeric',
            'category' => 'required',
            'test_id' => 'required',
            'test_commission' => 'required',
        ]);

        $doctor = new Doctor;
        $doctor->name = request('name');
        $doctor->address = request('address');
        $doctor->designation = request('designation');
        $doctor->checkup_commission = request('checkup_commission');
        $doctor->email = request('email');
        $doctor->fee = request('fee');
        $doctor->type = request('type');
        $doctor->status = request('status');
        $doctor->contact = request('contact');
        $doctor->category = $category;
        $doctor->created_by = Auth::id();
        $doctor->save();
        $doctor_id = $doctor->id;

        $test_count = count($request->test_id);
        for ($i=0; $i < $test_count; $i++)
        {
            $testcommission = new TestCommission;
            $testcommission->doctor_id = $doctor_id; //will be same always
            $testcommission->test_id = $request->test_id[$i]; 
            $testcommission->test_commission = $request->test_commission[$i]; 
            $testcommission->created_by = Auth::id();
            $testcommission->save();
        }

        return back()->with('success','Record Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        // return view('admin.tests.edit', compact('test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        // $validatedData = $request->validate(
        // [
        //     'name' => 'required|string|min:3|max:50',
        //     'rate' => 'required|numeric|min:0|max:9999999999',
        //     'category' => 'required',
        //     'status' => 'required',
        // ]);

        // $test = Test::find($id);
        // $test->name = request('name');
        // $test->rate = request('rate');
        // $test->category = request('category');
        // $test->status = request('status');
        // $test->updated_by = Auth::id();
        // $test->save();
        
        // return back()->with('success','Record Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}

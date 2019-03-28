<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Test;
use App\Doctor;
use App\TestBill;
use Auth;
use Illuminate\Http\Request;

class PatientController extends Controller
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
        $patients = Patient::all();
        return view('admin.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tests = Test::all();
        $doctors = Doctor::all();
        return view('admin.patients.create', compact('tests', 'doctors'));
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
            'welfare' => 'required',
            'total' => 'required',
            'discount' => 'required',
            'final_total' => 'required',

            'test_id' => 'required',
            'doctor_id' => 'required',
            'fee' => 'required',
            'no_of_test' => 'required',
            'sub_total' => 'required',
        ]);

        $patient = new Patient;
        $patient->name = request('name');
        $patient->welfare = request('welfare');
        $patient->total = request('total');
        $patient->discount = request('discount');
        $patient->final_total = request('final_total');
        $patient->created_by = Auth::id();
        $patient->save();

        $patient_id = $patient->id;
        $test_count = count($request->test_id);
        for ($i=0; $i < $test_count; $i++)
        {
            $testbill = new TestBill;
            $testbill->patient_id = $patient_id;
            $testbill->test_id = $request->test_id[$i];
            $testbill->doctor_id = $request->doctor_id[$i];
            $testbill->fee = $request->doctor_id[$i];
            $testbill->no_of_test = $request->doctor_id[$i];
            $testbill->sub_total = $request->doctor_id[$i];
            $testbill->created_by = Auth::id();
            $testbill->save();
        }

        $created_by = Auth::user()->name;
        $name = $request->name;
        $test_name = $request->test_name;
        $fee = $request->fee;
        $no_of_test = $request->no_of_test;
        $total = $request->total;
        $welfare = $request->welfare;
        $discount = $request->discount;
        $final_total = $request->final_total;
        return view('admin.patients.bill', compact('patient_id', 'created_by', 'name', 'test_name', 'fee', 'no_of_test', 'total', 'welfare', 'discount', 'final_total', 'test_count'));

        // return back()->with('success','Record Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        // echo "<pre>";
        // print_r ($patient);
        // echo "</pre>";
        // exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}

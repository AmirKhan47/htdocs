<?php

namespace App\Http\Controllers;

use App\Header;
use Illuminate\Http\Request;
use Auth;
use App\HospitalExpense;
use App\OtherExpense;
use App\Stock;

class HeaderController extends Controller
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
        $headers = Header::all();
        $menu = 'active';
        return view('admin.headers.index', compact('headers', 'menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.headers.create');
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
        $header = new Header;
        $header->name = request('name');
        $header->urdu_name = request('urdu_name');
        $header->category = request('category');
        $header->type = request('type');
        $header->status = request('status');
        $header->created_by = Auth::id();
        $header->save();
        // return back()->with('success','Record Added Successfully.');
        echo '1';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function show(Header $header)
    {
        echo $header;
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

    public function dailyreport(Request $request, Header $header, $category='', $month='', $year='')
    {
        if(empty($month))
        {
            $month = date('m'); //Output: current Month
        }
        if(empty($year))
        {
            $year = date('Y'); //Output: current Year
        }
        if ($request->month)
        {
            $month = $request->month;
        }
        if ($request->year)
        {
            $year = $request->year;
        }
        // echo "Month: " . $month ." Year: " . $year;
        // exit();
        if ($category=='Hospital')
        {
            $data = HospitalExpense::whereYear('created_at', '=', $year)
                                    ->whereMonth('created_at', '=', $month)
                                    ->get();
            return view('admin.headers.daily_report', compact('data', 'header', 'year', 'month'));
        }
        if ($category=='Other Business')
        {
            $data = OtherExpense::whereYear('created_at', '=', $year)
                                ->whereMonth('created_at', '=', $month)
                                ->get();
            return view('admin.headers.daily_report', compact('data', 'header', 'year', 'month'));
        }
        if ($category=='Stock')
        {
            $data = Stock::whereYear('created_at', '=', $year)
                            ->whereMonth('created_at', '=', $month)
                            ->get();
            return view('admin.headers.daily_report', compact('data', 'header', 'year', 'month'));
        }
    }
    public function monthlyreport(Request $request, Header $header, $category='', $year='')
    {
        if(empty($year))
        {
            $year = date('Y'); //Output: current Year
        }
        if ($request->year)
        {
            $year = $request->year;
        }
        // echo " Year: " . $year;
        // exit();
        if ($category=='Hospital')
        {
            $data = HospitalExpense::whereYear('created_at', '=', $year)->get();
            return view('admin.headers.monthly_report', compact('data', 'header', 'year'));
        }
        if ($category=='Other Business')
        {
            $data = OtherExpense::whereYear('created_at', '=', $year)->get();
            return view('admin.headers.monthly_report', compact('data', 'header', 'year'));
        }
        if ($category=='Stock')
        {
            $data = Stock::whereYear('created_at', '=', $year)->get();
            return view('admin.headers.monthly_report', compact('data', 'header', 'year'));
        }
    }
}

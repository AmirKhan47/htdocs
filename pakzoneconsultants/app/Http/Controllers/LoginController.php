<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if ($request->input('submit'))
        {
            $email = $request->input('email');
            $password = $request->input('password');
            $data = DB::table('admins')->where(['email' => $email,'password' => $password])->get();
            // dd($data[0]->admin_id);exit();
            // session()->put('admin_id', $data->admin_id);
            if ($data->count()>0)
            {
                session()->put('data', $data);
                // session()->put('admin_id', $data[0]->admin_id);
                $data1 = session()->all();
                // dd(session()->all());
                // exit();
                // dd($data1);exit();
                return redirect('admin');
            }
            else
            {
                return back()->with('success','Invalid Email/Password.');
            }
        }
        return view('admin.login');
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
        echo "store";
        exit();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function logout()
    {
        session()->flush();
        return redirect('login');
    }
}

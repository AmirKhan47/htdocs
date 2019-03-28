<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class UserController extends Controller
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
        $users = User::where('id', '!=', auth()->id())->get();
        $menu = 'active';
        return view('admin.users.index', compact('users', 'menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->input('submit'))
        {
            $validatedData = $request->validate(
            [
                'name' => 'required|string|min:3|max:50',
                'email' => 'required|email|max:50',
                'contact' => 'required|max:20',
            ]);
            // $id = auth()->User()->id;
            $user = User::find(auth()->User()->id);
            $user->name = request('name');
            $user->email = request('email');
            $user->contact = request('contact');
            $user->save();
            return back()->with('success','Record Updated Successfully.');
        }
        if ($request->input('submit1'))
        {
            if (!(Hash::check($request->get('old_password'), Auth::user()->password)))
            {
                // The passwords matches
                return redirect()->back()->with("error","Your current password does not matches with the old password you provided. Please try again.");
            }
            if(strcmp($request->get('old_password'), $request->get('password')) == 0)
            {
                //Current password and new password are same
                return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            }
            $validatedData = $request->validate(
            [
                'old_password' => 'required|string|min:6',
                'password' => 'required|string|min:6|confirmed',
            ]);

            $user = Auth::user();
            $user->password = bcrypt($request->get('password'));
            $user->save();
            return back()->with('success', 'Password Changed Successfully!');
        }
        if ($request->input('submit2'))
        {
            $validatedData = $request->validate(
            [
                'name' => 'required|string|min:3|max:50',
                'contact' => 'required|min:3|max:50',
                'username' => 'required|string|unique:users|min:3|max:50',
                'email' => 'required|email|unique:users|max:50',
                'role' => 'required',
                'cnic' => 'required|max:13',
                'address' => 'required|max:50',
                'password' => 'required|min:6',
                'status' => 'required',
            ]);
            $user = new User;
            $user->name = $request->name;
            $user->contact = $request->contact;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->role = $request->role;
            $user->cnic = $request->cnic;
            $user->address = $request->address;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->status = $request->status;
            $user->created_by = auth()->user()->id;
            $user->save();
            return back()->with('success', 'Record Added Successfully!');
        }
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
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
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
    public function get_users(Request $request)
    {
        $menu = 'active';
        $role = $request->role;
        if($role == 2)
        {
            $users = User::where(
                [
                    ['id', '!=', auth()->id()],
                    ['role', '=' , $role],
                ]
            )
            ->get();
            return view('admin.users.index', compact('users', 'menu', 'role'));
        }
        if($role == 3)
        {
            $users = User::where(
                [
                    ['id', '!=', auth()->id()],
                    ['role', '=' , $role],
                ]
            )
            ->get();
            return view('admin.users.index', compact('users', 'menu', 'role'));
        }
        return view('admin.users.index', compact('users', 'menu', 'role'));
    }
}

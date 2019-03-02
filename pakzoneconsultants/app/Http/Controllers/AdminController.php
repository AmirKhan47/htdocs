<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class AdminController extends Controller
{
    // function __construct()
    // {
        // if (!session()->has('admin_id'))
        // {
        //     echo "session khaali hai";
        //     $data1 = session()->all();
        //     dd($data1);
        //     exit();
        // }
    // }
    public function __construct()
    {
        //No session access from constructor work arround
        $this->middleware(function ($request, $next)
        {

            // dd(session()->all())
            if(!session('data'))
            {
                return redirect('login')->with('success', 'Your Session has been expired!');
            }
            // echo "ni hai";
            // dd(session()->exists('admin_id'));
            // dd(session()->all());
            // exit();
            // if (session()->has('admin_id'))
            // {
            //     echo "session khaali ni";
            //     exit();
            // }
            // dd(session()->all());
                // exit();
            // $admin_id = session('admin_id');
            // dd($admin_id);
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('admins')->count();
        $news = DB::table('news')->count();
        $files = DB::table('files')->count();
        return view('admin.dashboard', compact('users','news','files'));
    }
    public function profile(Request $request)
    {
        if ($request->input('submit'))
        {
            DB::table('admins')
                ->where('admin_id', session('data')[0]->admin_id)
                ->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'username' => $request->input('username'),
                    'password' => $request->input('password'),
                ]);
            return back()
                ->with('success','Record Updated Successfully.');
        }
        $data = DB::table('admins')->where('admin_id', session('data')[0]->admin_id)->first();
        // dd($data->admin_id);
        // exit();
        return view('admin.profile', ['data' => $data]);
    }
    public function user(Request $request)
    {
        if ($request->input('submit'))
        {
            $validatedData = $request->validate([
                'email' => 'required|email|unique:admins',
            ]);
            DB::table('admins')
                ->insert([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'username' => $request->input('username'),
                    'password' => $request->input('password'),
                    'created_by' => session('data')[0]->admin_id,
                ]);
            return back()
                ->with('success','Record Created Successfully.');
        }
        $data = DB::table('admins')->where('admin_id', '!=', session('data')[0]->admin_id)->get();
        return view('admin.user', ['data' => $data]);
    }
    public function update_user(Request $request, $admin_id='')
    {
        if ($request->input('submit'))
        {
            DB::table('admins')
            ->where('admin_id', $request->input('admin_id'))
            ->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'username' => $request->input('username'),
                'password' => $request->input('password'),
                'updated_by' => session('data')[0]->admin_id,
            ]);
            return back()->with('success','Record Updated Successfully.');
        }
        $data = DB::table('admins')->where('admin_id', $admin_id)->first();
        return view('admin.edit_user', ['data' => $data]);
    }
    public function delete_user($admin_id='')
    {
            DB::table('admins')->where('admin_id', $admin_id)->delete();
            return back()->with('success','Record Deleted Successfully.');
    }
    public function slider(Request $request)
    {
        if ($request->hasFile('image1_name'))
        {
            request()->validate([
                'image1_name' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'image1_name' => 'dimensions:min_width=100,max_width=1920,min_height=200,max_height=780',
            ]);
            $imageName = time().'.'.request()->image1_name->getClientOriginalExtension();
            request()->image1_name->move(public_path('uploads/slider_images'), $imageName);

            $old_image1_name = $request->input('old_image1_name');
            File::delete(public_path('uploads/slider_images/'. $old_image1_name));

            $image_id = $request->input('image_id');
            DB::table('sliders')
                ->where('image_id', $image_id)
                ->update(['image1_name' => $imageName]);
            return back()
                ->with('success','You have successfully upload image.')
                ->with('image1_name',$imageName);
        }
        if ($request->hasFile('image2_name'))
        {
            request()->validate([
                'image2_name' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'image2_name' => 'dimensions:min_width=100,max_width=1920,min_height=200,max_height=780',
            ]);
            $imageName = time().'.'.request()->image2_name->getClientOriginalExtension();
            request()->image2_name->move(public_path('uploads/slider_images'), $imageName);

            $old_image2_name = $request->input('old_image2_name');
            File::delete(public_path('uploads/slider_images/'. $old_image2_name));

            $image_id = $request->input('image_id');
            DB::table('sliders')
                ->where('image_id', $image_id)
                ->update(['image2_name' => $imageName]);
            return back()
                ->with('success','You have successfully upload image.')
                ->with('image2_name',$imageName);
        }
        if ($request->hasFile('image3_name'))
        {
            request()->validate([
                'image3_name' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'image3_name' => 'dimensions:min_width=100,max_width=1920,min_height=200,max_height=780',
            ]);
            $imageName = time().'.'.request()->image3_name->getClientOriginalExtension();
            request()->image3_name->move(public_path('uploads/slider_images'), $imageName);

            $old_image3_name = $request->input('old_image3_name');
            File::delete(public_path('uploads/slider_images/'. $old_image3_name));

            $image_id = $request->input('image_id');
            DB::table('sliders')
                ->where('image_id', $image_id)
                ->update(['image3_name' => $imageName]);
            return back()
                ->with('success','You have successfully upload image.')
                ->with('image3_name',$imageName);
        }
        if ($request->input('label1'))
        {
            $image_id = $request->input('image_id');
            DB::table('sliders')
                ->where('image_id', $image_id)
                ->update([
                    'label1' => $request->input('label1'),
                    'text1' => $request->input('text1'),
                ]);
            return back()
                ->with('success','Record Updated Successfully.');
        }
        if ($request->input('label2'))
        {
            $image_id = $request->input('image_id');
            DB::table('sliders')
                ->where('image_id', $image_id)
                ->update([
                    'label2' => $request->input('label2'),
                    'text2' => $request->input('text2'),
                ]);
            return back()
                ->with('success','Record Updated Successfully.');
        }
        if ($request->input('label3'))
        {
            $image_id = $request->input('image_id');
            DB::table('sliders')
                ->where('image_id', $image_id)
                ->update([
                    'label3' => $request->input('label3'),
                    'text3' => $request->input('text3'),
                ]);
            return back()
                ->with('success','Record Updated Successfully.');
        }
        $images = Slider::all();
        return view('admin.slider', compact('images'));
    }
    public function header(Request $request)
    {
        if ($request->input('submit'))
        {
            DB::table('sliders')
                ->where('image_id', $request->input('image_id'))
                ->update([
                    'header_email' => $request->input('header_email'),
                    'header_contact' => $request->input('header_contact'),
                    'header_facebook_link' => $request->input('header_facebook_link'),
                ]);
            return back()
                ->with('success','Record Updated Successfully.');
        }
        $images = Slider::all();
        return view('admin.header', compact('images'));
    }
    public function home(Request $request)
    {
        if ($request->input('submit'))
        {
            DB::table('sliders')
                ->where('image_id', $request->input('image_id'))
                ->update([
                    'introduction' => $request->input('introduction'),
                    'mission' => $request->input('mission'),
                    'vision' => $request->input('vision'),
                ]);
            return back()
                ->with('success','Record Updated Successfully.');
        }
        $images = Slider::all();
        return view('admin.home', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10',
        ]);
        if($request->hasFile('image'))
        {
            if($request->file('image')->isValid())
            {
                try
                {
                    $file = $request->file('image');
                    $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
                    # save to DB
                    // $tickes = Admin::create(['image' => $name]);
                    $request->file('image')->move("images", $name);
                    $share = new Admin([ 
                        'email' => $request->get('email'),
                        'password'=> $request->get('password'),
                        'image'=> $name
                    ]);
                    $share->save();
                }
                catch(Illuminate\Filesystem\FileNotFoundException $e)
                {
                }
            }
        }
        // $path = $request->file('image')->store('images');
        // Admin::create($request->all());
        return redirect('/admin/create')->with('success', 'Record has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
    public function file(Request $request)
    {
        if ($request->hasFile('file'))
        {
            request()->validate([
                'file' => 'required|image|mimes:jpeg,png,jpg,pdf,docx|max:2048',
            ]);
            $imageName = time().'.'.request()->file->getClientOriginalExtension();
            request()->file->move(public_path('uploads/files'), $imageName);
            DB::table('files')->insert([
                'file_title' => $request->input('file_title'),
                'file_description' => $request->input('file_description'),
                'file_name' => $imageName,
                'created_by' => session('data')[0]->admin_id]
            );
            return back()->with('success','File Uploaded Successfully.');
        }
        $data = DB::table('files')->get();
        return view('admin.file', compact('data'));
    }
    public function news(Request $request)
    {
        if ($request->input('submit'))
        {
            DB::table('news')->insert([
                    'news_headline' => $request->input('news_headline'),
                    'news_description' => $request->input('news_description'),
                    'created_by' => session('data')[0]->admin_id,
                ]);
            return back()
                ->with('success','News Created Successfully.');
        }
        $data = DB::table('news')->orderBy('news_id', 'desc')->get();
        return view('admin.news', compact('data'));
    }
}

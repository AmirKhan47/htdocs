<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $files = File::orderBy('created_at', 'desc')->get();
        // dd($files);
        $active = 'files';
        return view('dashboard.showFiles')->with('files', $files)->with('active', $active);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'files';
        return view('dashboard.createFile')->with('active', $active);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'file_title' => 'required',
                'file_name'  => 'required'
            ],
        );

        if($request->hasFile('file_name')){
            $fileNameWithExt = $request->file('file_name')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file_name')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('file_name')->storeAs('/public/uploads/files', $fileNameToStore);
        }

        $file = new File;
        $file->file_title = $request->input('file_title');
        $file->file_description = $request->input('file_description');
        $file->file_name = $fileNameToStore;
        $file->user_id = auth()->user()->id;
        $file->save();

        return redirect('/files')->with('success', 'New File Added Successfully!');
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
        $file = File::find($id);
        $file->delete();
        return redirect('/files')->with('success', 'File Deleted Successfully!');
    }
}

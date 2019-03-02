<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Slider::all();
        return view('admin.slider', compact('images'));
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
                ->with('success','Record Updated Successfully.');        }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
    }
}

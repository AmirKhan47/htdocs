<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SliderImage;

class SliderImagesController extends Controller
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
        $images = SliderImage::orderBy('created_at', 'desc')->get();
        $active = 'images';
        return view('dashboard.showImages')->with('images', $images)->with('active', $active);
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
        $this->validate(
            $request,
            [
                'slider_image' => 'required|image|dimensions:min_width=1350,min_height=670,max_width=1400,max_height=700'
            ]
        );
        if($request->hasFile('slider_image')){
            $imageNameWithExtension = $request->file('slider_image')->getClientOriginalName();
            $imageName = pathinfo($imageNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('slider_image')->getClientOriginalExtension();
            $imageNameToStore = $imageName.'_'.time().'.'.$extension;
            $path = $request->file('slider_image')->storeAs('/public/uploads/slider_images', $imageNameToStore);
        }

        $image = SliderImage::find($id);
        $image->image_name = $imageNameToStore;
        $image->save();

        return redirect('/sliderImages')->with('success', 'Slider Image '. $id. ' Updated Succesfully!');
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
}

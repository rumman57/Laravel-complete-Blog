<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Session;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sliders = Slider::orderBy('id','asc')->get();
       return view('myadmin.showallslider')->withSliders($sliders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('myadmin.addslider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,array(
            'title'       => 'required|max:255',
            'description' => 'required',
            'Button_link' => 'required',
            'image'       => 'required | mimes:jpeg,jpg | max:1000'
            ));
        $sliders = new Slider;
        $sliders->title        = $request->title;
        $sliders->description  = $request->description;
        $sliders->button_link    = $request->Button_link;
         
         if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('img/'.$filename);

            Image::make($image)->resize(1920,480)->save($location);
            $sliders->image = $filename;
         }

        $sliders->save();
     
        Session::flash('adsuccess','Slider Successfully Added');
        return redirect()->back();
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
        $slider = Slider::find($id);
        return view('myadmin.editslider')->withOldslider($slider);
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
        $this->validate($request,array(
            'title'       => 'required|max:255',
            'description' => 'required',
            'Button_link' => 'required',
            'image'       => 'mimes:jpeg,jpg | max:1000'
            ));
        $slider = Slider::find($id);
        $slider->title        = $request->input('title');
        $slider->description  = $request->input('description');
        $slider->button_link  = $request->input('Button_link');
         
         if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('img/'.$filename);

            Image::make($image)->resize(1920,480)->save($location);
            $oldimage = $slider->image;
            $slider->image = $filename;
            unlink('img/'.$oldimage);

         }

        $slider->save();
     
        Session::flash('adsuccess','Slider Updated Successfully...');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $oldimage = $slider->image;
        unlink('img/'.$oldimage);
        $slider->delete();
        return redirect()->back();
    }
}

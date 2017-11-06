<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeaturedBlock;
use Image;
use Session;
use Storage;
class FeaturedBlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featuredblocks = FeaturedBlock::orderBy('id','desc')->get();
        return view('myadmin.showfeturedblock')->withFblocks($featuredblocks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('myadmin.addfeaturedblock');
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
            'featured_desc' => 'required',
            'button_link'        => 'required',
            'image'       => 'required | mimes:jpeg,jpg,png | max:1000'
            ));
        $featuredblocks = new FeaturedBlock;
        $featuredblocks->title          = $request->title;
        $featuredblocks->featured_desc  = $request->featured_desc;
        $featuredblocks->button_link    = $request->button_link;
         
         if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('img/'.$filename);

            Image::make($image)->resize(262,173)->save($location);
            $featuredblocks->image = $filename;
         }

        $featuredblocks->save();
     
        Session::flash('adsuccess','FeaturedBlock Successfully Added');
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Oldfbblocks = FeaturedBlock::find($id);
        return view('myadmin.editfbblock')->withOldfbblocks($Oldfbblocks);
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
            'featured_desc' => 'required',
            'button_link'        => 'required',
            'image'       => 'mimes:jpeg,jpg,png | max:1000'
            ));
        $featuredblock = FeaturedBlock::find($id);

        $featuredblock->title          = $request->input('title');
        $featuredblock->featured_desc  = $request->input('featured_desc');
        $featuredblock->button_link    = $request->input('button_link');
         
         if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('img/'.$filename);

            Image::make($image)->resize(262,173)->save($location);
            $oldimage = $featuredblock->image;

            $featuredblock->image = $filename;
            unlink('img/'.$oldimage);
            //Storage::delete('img/'.$oldimage);
         }

        $featuredblock->save();
     
        Session::flash('adsuccess','FeaturedBlock Updated Successfully');
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
       $featuredblock = FeaturedBlock::find($id);
       $oldimage = $featuredblock->image;
       unlink('img/'.$oldimage);
       $featuredblock->delete();
       return redirect()->back();
    }
}

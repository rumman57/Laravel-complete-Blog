<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ftItemLeft;
use Session;
use Image;

class FtItemLeftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ftitemlefts = ftItemLeft::orderBy('id','desc')->get();
        return view('myadmin.showftitemleft')->withFtitemlefts($ftitemlefts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('myadmin.addftitemleft');
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
            'title'          => 'required|max:255',
            'description'    => 'required',
            'icon'           => 'required'
            ));

        $ftitemleft = new ftItemLeft;

        $ftitemleft->title = $request->title;
        $ftitemleft->desc  = $request->description;
        $ftitemleft->icon  = $request->icon;

        $ftitemleft->save();
     
        Session::flash('adsuccess','FeaturedItem Left Successfully Added');
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
        $OldfItemL = ftItemLeft::find($id);
        return view('myadmin.editfitemleft')->withOldfitemleft($OldfItemL);
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
            'title'          => 'required|max:255',
            'description'    => 'required',
            'icon'           => 'required'
            ));

        $ftitemleft = ftItemLeft::find($id);

        $ftitemleft->title = $request->input('title');
        $ftitemleft->desc  = $request->input('description');
        $ftitemleft->icon  = $request->input('icon');

        $ftitemleft->save();
     
        Session::flash('adsuccess','FeaturedItem Left Updated Successfully...');
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
        $ftItemLeft = ftItemLeft::find($id);
        $ftItemLeft->delete();
         return redirect()->back();
    }
}

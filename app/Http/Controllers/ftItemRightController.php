<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ftItemRight;
use Session;
class ftItemRightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ftItemRights = ftItemRight::orderBy('id','desc')->get();
        return view('myadmin.showftitemright')->withFtitemrights($ftItemRights);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('myadmin.addftitemright');
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
            'Accordian_link' => 'required'
            ));

        $ftitemright = new ftItemRight;

        $ftitemright->title           = $request->title;
        $ftitemright->desc            = $request->description;
        $ftitemright->accordian_link  = $request->Accordian_link;

        $ftitemright->save();
     
        Session::flash('adsuccess','FeaturedItem Right Successfully Added');
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
        $OldfItemR = ftItemRight::find($id);
        return view('myadmin.editfitemright')->withOldfitemright($OldfItemR);
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
            'Accordian_link' => 'required'
            ));

        $ftitemright = ftItemRight::find($id);

        $ftitemright->title           = $request->input('title');
        $ftitemright->desc            = $request->input('description');
        $ftitemright->accordian_link  = $request->input('Accordian_link');

        $ftitemright->save();
     
        Session::flash('adsuccess','FeaturedItem Right Updated Successfully..');
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
       $ftitemright = ftItemRight::find($id);
       $ftitemright->delete();
       return redirect()->back();
    }
}

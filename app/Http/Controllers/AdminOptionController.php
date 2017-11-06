<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\FtItem;
use App\Models\SiteOption;
use Session;
use Image;

class AdminOptionController extends Controller
{
      
      /***** Page Information Modification(Pages Menu)  Start**********/
    public function getInsertDataAboutPage(){
        $aboutpage = Page::find(1);
        return view('myadmin.setaboutpage')->withAboutpage($aboutpage);
    }
    public function postInsertDataAboutPage(Request $request){
        $this->validate($request,[
            'body' => 'required|min:20'
        ]);
        
        $aboutpage = Page::find(1);    
        $aboutpage->about = $request->input('body');
        $aboutpage->save();
        Session::flash('adsuccess','About Page Set Successfully...');
        return redirect()->back();
    }

    public function getprivacyplicypage(){
       $pppage = Page::find(1);
        return view('myadmin.setprivacypolicy')->withPrivacyp($pppage);
    }
    public function postprivacyplicypage(Request $request){
        $this->validate($request,[
            'body' => 'required|min:20'
        ]);
        
        $pppage = Page::find(1);    
        $pppage->privacy_policy = $request->input('body');
        $pppage->save();
        Session::flash('adsuccess','Privacy Policy Page Set Successfully...');
        return redirect()->back();
    }

    public function getLoyalitypage(){
       $olpage = Page::find(1);
        return view('myadmin.setloyalitypage')->withOurloyality($olpage);
    }
    public function postLoyalitypage(Request $request){
        $this->validate($request,[
            'body' => 'required|min:20'
        ]);
        
        $olpage = Page::find(1);    
        $olpage->our_loyality = $request->input('body');
        $olpage->save();
        Session::flash('adsuccess','Our Loyality Page Set Successfully...');
        return redirect()->back();
    }

    public function getTermPage(){
        $tcpage = Page::find(1);
        return view('myadmin.settermpage')->withTermscon($tcpage);
    }
    public function postTermPage(Request $request){
        $this->validate($request,[
            'body' => 'required|min:20'
        ]);
        
        $tcpage = Page::find(1);    
        $tcpage->terms_conditoin = $request->input('body');
        $tcpage->save();
        Session::flash('adsuccess','Terms & Conditon Page Set Successfully...');
        return redirect()->back();
    }

     /***** Page Information Modification(Pages Menu)  Start**********/

     /***** Page Information Modification(Pages Menu)  Start**********/
   public function getFtitemleftheading(){
        $ftilh = FtItem::find(1);
        return view('myadmin.setftitemleft')->withFtitlh($ftilh);
    }
    public function postFtitemleftheading(Request $request){
        $this->validate($request,[
            'title' => 'required|min:5|max:150',
            'description' =>'required|min:6|max:250'
        ]);
        
        $ftilh = FtItem::find(1);    
        $ftilh->ftItLeftTitle = $request->input('title');
        $ftilh->ftItLeftDesc = $request->input('description');
        $ftilh->save();
        Session::flash('adsuccess','Page Set Successfully...');
        return redirect()->back();
    }

    public function getFtitemRightheading(){
        $ftirh = FtItem::find(1);
        return view('myadmin.setftitemright')->withFtitrh($ftirh);
    }
    public function postFtitemRightheading(Request $request){
        $this->validate($request,[
            'title' => 'required|min:5|max:150',
            'description' =>'required|min:6|max:250'
        ]);
        
        $ftirh = FtItem::find(1);    
        $ftirh->ftItRightTitle = $request->input('title');
        $ftirh->ftItRightDesc = $request->input('description');
        $ftirh->save();
        Session::flash('adsuccess','Page Set Successfully...');
        return redirect()->back();
    }
     /***** Page Information Modification(Pages Menu)  End**********/

     /***** Page Site Options Start**********/
    public function getOptionsPage(){
       $siteops = SiteOption::find(1);
       return view('myadmin.siteoptions')->withSiteoptions($siteops);
    }
    public function postOptionsPage(Request $request){
      $this->validate($request,[
            'title' => 'min:4|max:50',
            'description' =>'min:6|max:200',
            'image'  => 'mimes:jpeg,jpg | max:1000',
            'copyright' =>'min:5|max:100'
        ]);

        $siteops = SiteOption::find(1);
        $siteops->site_title_text = $request->input('title');
        $siteops->site_description = $request->input('description');
        $siteops->copyright = $request->input('copyright');
        
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('img/'.$filename);

            Image::make($image)->save($location);
            $oldimage = $siteops->site_title_image;
            $siteops->site_title_image = $filename;
            if(!empty($oldimage))
            unlink('img/'.$oldimage);
        }else{   
            $oldimage = $siteops->site_title_image;
            $siteops->site_title_image = "";
            if(!empty($oldimage))
            unlink('img/'.$oldimage);    
        }

         $siteops->save();
         Session::flash('adsuccess','Options Set Successfully...');
         return redirect()->back();
    }
     /***** Page Site Options End**********/



}

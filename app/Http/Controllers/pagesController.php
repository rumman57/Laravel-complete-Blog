<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\FeaturedBlock;
use App\Models\FtItem;
use App\Models\ftItemLeft;
use App\Models\ftItemRight;
use App\Models\Post;
use App\Models\Category;
use App\Models\Page;
use App\Models\Contact;
use Session;

class pagesController extends Controller
{
	public function getIndex(){
	 	
    	$sliders  = Slider::all();
    	$feBlocks = FeaturedBlock::all();
    	$ftItems = FtItem::find(1);
    	$ftItemLefts = ftItemLeft::all();
    	$ftItemRights = ftItemRight::all();

        return view('blog.index')->with('sliders',$sliders)
                                 ->with('feBlocks',$feBlocks)
                                 ->with('ftItem',$ftItems)
                                 ->with('ftItemLefts',$ftItemLefts)
                                 ->with('ftItemRights',$ftItemRights);
    }

    public function getBlogPage(){

        $posts = Post::orderBy('id','desc')->paginate(3);
        $categories = Category::with('posts')->get();;
    	return view('blog.blog',compact('categories'))->withPosts($posts);
    }

    public function getAbout(){
        $aboutpage = Page::find(1);
        return view('pages.about')->withAboutpage($aboutpage);
    }
    public function getPrivacyPolicy(){
        $pp = Page::find(1);
        return view('pages.privacypolicy')->withPrivcypo($pp);
    }
    public function getOurLoyality(){
        $ol = Page::find(1);
        return view('pages.outloyality')->withOurloylity($ol);
    }

    public function getTermsandCondition(){
        $tt = Page::find(1);
    	return view('pages.termsandcondition')->withTermconditon($tt);
    }
    public function getContact(){
        return view('pages.contact');
    }
    public function postContact(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'subject'=>'min:3| max:150',
            'name'   => 'max:30'
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->body = $request->message;
        $contact->save();
        Session::flash('consuccess',"Message Send Successfully...");
        return redirect()->back();
    }
                  

}

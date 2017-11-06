<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use App\Models\Contact;
use App\Mail\SendComposeMail;
use Session;
use Mail;

class AdminContactController extends Controller
{
    public function getContact(){
    	$contacts = Contact::orderBy('id','desc')->paginate(30);
    	return view('myadmin.mailbox')->withContacts($contacts);
    }
    public function getReadContactMessage($id){
    	$contact = Contact::find($id);
    	$contact->check="1";
    	$contact->save();
    	$contacts = Contact::orderBy('id','desc')->get();
    	return view('myadmin.read-mail')->withContact($contact)->withContacts($contacts);
    }
    public function getComposerPage(){
    	$contacts = Contact::orderBy('id','desc')->get();
    	return view('myadmin.compose')->withContacts($contacts);
    }
     public function getReplyPage($id){
     	$contact = Contact::find($id);
    	$contacts = Contact::orderBy('id','desc')->get();
    	return view('myadmin.replymessage')->withContacts($contacts)->withContact($contact);
    }
    public function postSendComposeMsg(Request $request,Mailer $mailer){
       $this->validate($request,[
            'to' => 'required|email',
            'body' =>'required|min:5',
            'subject'=>'min:3|max:150'
       	]);
        $data = array(
              'to'      => $request->to,
              'subject'    => $request->subject,
              'bodymessage'=> $request->body
            );
         Mail::send('myadmin.composemsglayout',$data,function($message) use($data){
              $message->from('rumman142228@gmail.com');
              $message->to($data['to']);
              $message->subject($data['subject']);
         });

         Session::flash('adsuccess',"Email Send Successfully..");

         return redirect()->back();
      // $mailer->to($request->input('to'))->send(new SendComposeMail($request->input('body')));
        //return mailer()
    }

}

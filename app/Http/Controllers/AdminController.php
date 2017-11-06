<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUser;
use App\Models\Contact;
use Session;
use Auth;

class AdminController extends Controller
{
    public function getIndex(){
        $contacts = Contact::where('check','=',0)->get();
    	return view('myadmin.index')->withContacts($contacts);
    }
    public function getRegister(){
    	return view('myadmin.register');
    }
    public function postRegister(Request $request){
       $this->validate($request,[
        	 'name'    =>  'required|alpha|max:100|min:4',
        	 'email'   => 'required|email',
        	 'password' =>  'required|confirmed',
        	 'password_confirmation' => 'sometimes|required_with:password'
        ]);
        $users = new AdminUser();
        $users->name     = $request->name;
        $users->email     = $request->email;
        $users->password = bcrypt($request->password);
        $users->retype_password = bcrypt($request->password_confirmation);
        $users->save();
        Session::flash('loginsuccess','Registration Completed Successfully. Sign In Please.');
        return redirect()->back();
    }
    public function getLogin(){
        return view('myadmin.login');
    }
    public function postLogin(Request $request){
        $this->validate($request,[
             'email'   => 'required|email',
             'password' =>  'required'
        ]);
        
        $email     = $request->email;
        $password  = $request->password;
       
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
           
            return redirect()->route('admin.index');
        }
        Session::flash('loginerror','Email Or Password Is Incorrect');
        return redirect()->route('admin.login');
            
    }
    public function getLogOut(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
    

}

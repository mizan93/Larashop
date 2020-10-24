<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Inbox;
use App\Contact;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
   public function index(){
       $contact= Contact::first();
       return view('contact',compact('contact'));
   }
   public function store(Request $request){

       $this->validate($request,[
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required'
    ]);
    $inbox=new Inbox();
    $inbox->name = $request->name;
    $inbox->email = $request->email;
    $inbox->subject	 = $request->subject;
    $inbox->message	 = $request->message;
    $inbox->save();

    Toastr::success('Thank you for your Message:)','Success');
    return redirect()->back();
   }
   public function getBlog(){
     $blogs= Blog::orderBy('created_at', 'desc')->paginate(3);
    return view('blog',compact('blogs'));
   }
   public function getSingleBlog($id){
     $blog=Blog::find($id);
     return view('single_blog',compact('blog'));
   }

}

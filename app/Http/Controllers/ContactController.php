<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function index(){
       $contact= Contact::first();
       return view('contact',compact('contact'));
   }
   public function store(Request $request){
       return $request;
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

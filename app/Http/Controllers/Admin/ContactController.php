<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    public function edit(){
        $contact= Contact::where('id','1')->first();
        return view('admin.contact.contact',compact('contact'));
    }
    public function update(Request $request, $id){
        $contact=Contact::find($id);
        $contact->address = $request->address;
        $contact->city = $request->city;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->fb_link = $request->fb_link;
        $contact->tw_link = $request->tw_link;
        $contact->insta_link = $request->insta_link;
        $contact->gplus_link = $request->gplus_link;
        $contact->youtube_link = $request->youtube_link;
        $contact->save();
        Toastr::success('Company Info has been updated :)', 'Success');

         return redirect()->back();

    }
    
}

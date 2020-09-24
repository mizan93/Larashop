<?php

namespace App\Http\Controllers;

use App\Review;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function storeReview(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'commephpnt' => 'required|'
        ]);
        $reveiw = new Review();
        $reveiw->name = $request->name;
        $reveiw->email = $request->email;
        $reveiw->comment = $request->comment;
        $reveiw->save();
        $reveiw->products()->attach($request->product);

        Toastr::success('Thank you for your reveiw:)','Success');
        return redirect()->back();
    }
}

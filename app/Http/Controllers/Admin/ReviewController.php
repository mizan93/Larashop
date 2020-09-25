<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function  index(){
         $reviews=Review::all();
         return view('admin.review.index',compact('reviews'));
    }
    public function  show($id){

         $review=Review::findOrfail($id);
         return view('admin.review.show',compact('review'));
    }
}

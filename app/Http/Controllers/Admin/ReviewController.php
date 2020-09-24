<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function  index(){
        return $reviews=Review::all();
    }
}

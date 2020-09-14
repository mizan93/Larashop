<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;

class ProductController extends Controller
{
    public function getProduct(){
        $categories= Category::latest()->get();
        $brands= Brand::latest()->get();
        $products= Product::latest()->get();
        return view('home',compact('categories','brands','products'));
    }

}

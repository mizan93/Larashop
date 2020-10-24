<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use App\Slider;

class ProductController extends Controller
{
    public function getProduct(){
       
        $sliders= Slider::all();
        $products= Product::latest()->get();
        $randomProducts= Product::latest()->inRandomOrder()->get();
return view('home',compact('products','randomProducts','sliders'));
    }
    public function Products(){
        
        $sliders= Slider::all();
        $products= Product::latest()->get();
        $randomProducts= Product::latest()->inRandomOrder()->get();
return view('products',compact('products','randomProducts','sliders'));
    }
    public function details($slug){
        
        $product=Product::where('slug',$slug)->first();
        $randomProducts= Product::latest()->inRandomOrder()->get();
        return view('details',compact('product','randomProducts'));
    }
    public function productByBrand($slug){
         $brand=Brand::where('slug',$slug)->first();
          $products=$brand->products()->get();
       return view('productBybrand',compact('brand','products'));

    }
    public function productByCat($slug){
        $category=Category::where('slug',$slug)->first();
        $products=$category->products()->get();
        return view('productBycat',compact('category','products'));
    }
    public function search(Request $request){
        $searchdata= $request->input('searchdata');
        $products=Product::where('name','like',"%$searchdata%")->get();
        return view('search',compact('products','searchdata'));
    }
    public function priceRange(Request $request){
        $minval= $request->input('minval');
        $maxval= $request->input('maxval');
        $products=Product::whereBetween('price',[$minval,$maxval])->get();
       return view('pricerange',compact('products','minval','maxval'));
    }

    public function notfound(){
        return view('notfound');
    }
}

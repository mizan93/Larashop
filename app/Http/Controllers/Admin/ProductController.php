<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::latest()->get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $brands=Brand::all();
       return view('admin.product.create',compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'code' => 'required|numeric',
            'price' => 'required|numeric',
            'category' => 'required',
            'brand' => 'required',
            'description' => 'required',

        ]);

       // get form image
       $image = $request->file('image');
       $slug = Str::slug($request->name);

       if (isset($image))
       {
//            make unique name for image
           $currentDate = Carbon::now()->toDateString();
           $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//            check item dir is exists
           if (!Storage::disk('public')->exists('product'))
           {
               Storage::disk('public')->makeDirectory('product');
           }
//            resize image for item and upload
           $item = Image::make($image)->resize(500,333)->stream();
           Storage::disk('public')->put('product/'.$imagename,$item);

       } else {
           $imagename = "default.png";
       }
       $product = new Product();
       $product->code = $request->code;
       $product->name = $request->name;
       $product->cat_id = $request->category;
       $product->brand_id = $request->brand;
       $product->description = $request->description;
       $product->price = $request->price;
       $product->image = $imagename;
       $product->save();
      
        
        Toastr::success('product Successfully Saved :)','Success');
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $product=Product::findOrFail($id);
        return view('admin.product.view',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::all();
        $brands=Brand::all();
        $product=Product::findOrFail($id);
        return view('admin.product.edit',compact('product','categories','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'code' => 'required',
            'price' => 'required|numeric',
           
            'description' => 'required',

        ]);

       // get form image
       $image = $request->file('image');
       $slug = Str::slug($request->name);
       $product =Product::findOrFail($id);
       if (isset($image))
       {
//            make unique name for image
           $currentDate = Carbon::now()->toDateString();
           $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//            check item dir is exists
           if (!Storage::disk('public')->exists('product'))
           {
               Storage::disk('public')->makeDirectory('product');
           }
           //            delete old image
           if (Storage::disk('public')->exists('product/' . $product->image)) {
            Storage::disk('public')->delete('product/' . $product->image);
        }
//            resize image for item and upload
           $item = Image::make($image)->resize(500,333)->stream();
           Storage::disk('public')->put('product/'.$imagename,$item);

       } else {
           $imagename =  $product->image;
       }
       $product->code = $request->code;
       $product->name = $request->name;
       $product->cat_id = $request->category;
       $product->brand_id = $request->category;
       $product->description = $request->description;
       $product->price = $request->price;
       $product->image = $imagename;
       $product->save();
        Toastr::success('product  Updated :)','Success');
        return redirect()->route('admin.product.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (Storage::disk('public')->exists('product/' . $product->image)) {
            Storage::disk('public')->delete('product/' . $product->image);
        }
        $product->delete();
        Toastr::success('product Successfully Deleted :)', 'Success');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $blogs=Blog::latest()->get();
       return view('admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
            'writer_name' => 'required',
            'blog_title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
             ]);
        // get form image
        $image = $request->file('image');
        $slug = Str::slug($request->blog_title);

        if (isset($image))
        {
//            make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//            check blog dir is exists
            if (!Storage::disk('public')->exists('blog'))
            {

                Storage::disk('public')->makeDirectory('blog');
            }
//            resize image for blog and upload
            $blog = Image::make($image)->resize(500,400)->stream();
            Storage::disk('public')->put('blog/'.$imagename,$blog);

        } else {
            $imagename = "default.png";
        }
        $blog = new Blog();

        $blog->writer_name = $request->writer_name;
        $blog->blog_title = $request->blog_title;
        $blog->description = $request->description;
        $blog->image = $imagename;
        $blog->save();
        Toastr::success('blog section has been Created :)' ,'Success');
        return redirect()->route('admin.blog.index');
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog=Blog::find($id);
        return view('admin.blog.edit',compact('blog'));

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
            'writer_name' => 'required',
            'blog_title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',

             ]);
        // get form image
        $image = $request->file('image');
        $slug = Str::slug($request->blog_title);
            $blog=Blog::find($id);
        if (isset($image))
        {
//            make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//           check blog dir is exists
            if (!Storage::disk('public')->exists('blog'))
            {

                Storage::disk('public')->makeDirectory('blog');
            }
              //    delete old image
              if (Storage::disk('public')->exists('blog/' . $blog->image)) {
                Storage::disk('public')->delete('blog/' . $blog->image);
            }
//resize image for blog and upload
            $image = Image::make($image)->resize(500,400)->stream();
            Storage::disk('public')->put('blog/'.$imagename,$image);

        } else {
            $imagename = $blog->image;
        }

        $blog->writer_name = $request->writer_name;
        $blog->blog_title = $request->blog_title;
        $blog->description = $request->description;
        $blog->image = $imagename;
        $blog->save();
        Toastr::success('blog  has been Updated :)' ,'Success');
        return redirect()->route('admin.blog.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        if (Storage::disk('public')->exists('blog/' . $blog->image)) {
            Storage::disk('public')->delete('blog/' . $blog->image);
        }
        $blog->delete();
        Toastr::success('blog has been Deleted :)', 'Success');
        return redirect()->back();
  
    }
    
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        // get form image
        $image = $request->file('image');
        $slug = Str::slug($request->title);

        if (isset($image))
        {
//            make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//            check slider dir is exists
            if (!Storage::disk('public')->exists('slider'))
            {
                Storage::disk('public')->makeDirectory('slider');
            }
//            resize image for slider and upload
            $slider = Image::make($image)->resize(500, 333)->stream();
            Storage::disk('public')->put('slider/'.$imagename,$slider);

        } else {
            $imagename = "default.png";
        }
        $slider= new Slider();
        $slider->title=$request->title;
        $slider->sub_title=$request->sub_title;
        $slider->image=$imagename;
        $slider->save();
        Toastr::success('Slider hss been Created :)' ,'Success');

        return redirect()->route('admin.slider.index');
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

            $slider = Slider::findOrFail($id);
            return view('admin.slider.edit',compact('slider'));

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
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        // get form image
        $image = $request->file('image');
        $slug = Str::slug($request->title);
        $slider = Slider::find($id);
        if (isset($image)) {
            //            make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            //            check slider dir is exists
            if (!Storage::disk('public')->exists('slider')) {
                Storage::disk('public')->makeDirectory('slider');
            }
            //            delete old image
            if (Storage::disk('public')->exists('slider/' . $slider->image)) {
                Storage::disk('public')->delete('slider/' . $slider->image);
            }
            //            resize image for slider and upload
            $sliderimage = Image::make($image)->resize(500, 333)->stream();
            Storage::disk('public')->put('slider/' . $imagename, $sliderimage);


        } else {
            $imagename = $slider->image;
        }

        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->image = $imagename;
        $slider->save();
        Toastr::success('slider has been Updated :)', 'Success');
        return redirect()->route('admin.slider.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {$slider = Slider::findOrFail($id);
        if (Storage::disk('public')->exists('slider/' . $slider->image)) {
            Storage::disk('public')->delete('slider/' . $slider->image);
        }
        $slider->delete();
        Toastr::success('Slider has been Deleted :)', 'Success');
        return redirect()->back();
    }
}

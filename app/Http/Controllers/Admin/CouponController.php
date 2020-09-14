<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = coupon::latest()->get();
        return view('admin.coupon.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.create');
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
            'code' => 'required|unique:coupons',
            'discount' => 'required|:'
        ]);
        $coupon = new coupon();
        $coupon->code = $request->code;
        $coupon->discount =$request->discount;
        $coupon->save();
        Toastr::success('coupon Successfully Saved :)','Success');
        return redirect()->route('admin.coupon.index');
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
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.edit',compact('coupon'));
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
            'code' => 'required|unique:coupons',
            'discount' => 'required|:'
        ]);

        $coupon = Coupon::findOrFail($id);
        $coupon->code = $request->code;
        $coupon->discount =$request->discount;
        $coupon->save();
        Toastr::success('coupon Successfully Updated :)','Success');

        return redirect()->route('admin.coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Coupon::findOrFail($id)->delete();
       Toastr::success('coupon Successfully Deleted :)','Success');
       return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $orders=Order::orderby('created_at','desc')->get();
         $pending=Order::where('status','pending')->get();
         $processing=Order::where('status','processing')->get();
         $canceled=Order::where('status','canceled')->get();
         $completed=Order::where('status','completed')->get();
        return view('admin.order.index',compact('orders','pending','processing','canceled','completed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=Order::find($id);

        return view('admin.order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $order=Order::find($id);
        return view('admin.order.edit',compact('order'));
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
        $order=Order::find($id);

        $order->name=$request->name;
        $order->phone=$request->phone;
        $order->address=$request->address;
        $order->city=$request->city;
        $order->zipcode=$request->zipcode;
        $order->notes=$request->notes;
        $order->save();
        // foreach ($order->items->quantity2 as $qty) {
        //    $qty=$request->qty;
        //    $qty->save();
        // }
        $order->items()->sync($request->quantity2);


        Toastr::success('Order has been Updated :)','Success');
        return redirect()->back();


    }
    public function processing( $id)
    {
        $order=Order::find($id);
        $order->status='processing';
        $order->save();
        Toastr::success('Order status changed to  processing:)','Success');
        return redirect()->back();
    }
    public function completed( $id)
    {
        $order=Order::find($id);
        $order->status='completed';
        $order->save();
        Toastr::success('Order has been completed :)','Success');
        return redirect()->back();
    }
    public function canceled( $id)
    {
        $order=Order::find($id);
        $order->status='canceled';
        $order->save();
        Toastr::success('Order Canceled:)','Success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order=Order::find($id);
        $order->items()->detach();
        $order->delete();
        Toastr::success('Order has been Deleted :)', 'Success');
        return redirect()->back();
    }
}

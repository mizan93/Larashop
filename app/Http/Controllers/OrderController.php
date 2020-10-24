<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required|max:11|min:11',
            'address' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'payment_method' => 'required'
        ]);
        $order = new Order();
        $order->name = $request->name;
        $order->order_no = uniqid('OrderNumber-');
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->zipcode = $request->zipcode;
        $order->notes = $request->notes;

        $order->grand_total=\Cart::session(auth()->id())->getTotal();
        $order->item_count=\Cart::session(auth()->id())->getContent()->count();
        $order->user_id=auth()->id();

        if(request('payment_method')=='paypal'){
           $order->payment_method='paypal';

        }

        $order->save();
        // save ordered items

        $cartItems=\Cart::session(auth()->id())->getContent();

        foreach ($cartItems as $key => $item) {
            $order->items()->attach($item->id,[
                'price2'=>$item->price,
                'quantity2'=>$item->quantity
            ]);
        }
        // payment method

        if(request('payment_method')=='paypal'){
            return redirect()->route('paypal.checkout',$order->id);

        }
        // empty cart
        \Cart::session(auth()->id())->clear();

        // send email to customer
        Mail::to($order->user->email)->send(new OrderMail($order));


        Toastr::success('Thank you for ordering our Product :)','Success');
        return redirect()->route('home');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

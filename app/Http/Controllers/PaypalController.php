<?php

namespace App\Http\Controllers;

use App\Mail\OrderPaid;
use App\Order;
use Brian2694\Toastr\Facades\Toastr;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Facades\PayPal;

class PaypalController extends Controller
{
    public function getExpressCheckout($orederId){
        $checkout_data=$this->checkoutData($orederId);

        // $provider = new PayPalClient;
        $provider = PayPal::setProvider();
       $response= $provider->setExpressCheckout($checkout_data);
       return redirect()->route('paypal_link');
    }
    private function checkoutData($orederId){
        $cart=\Cart::session(auth()->id());

        $cartItems= array_map(function($item){
            return [
                'name'=>$item['name'],
                'price'=>$item['price'],
                'qty'=>$item['quantity'],
            ];
        },$cart->getContent()->toarray());

        $checkout_data=[
            'items'=>$cartItems,
                'return_url'=>route('paypal.success',$orederId),
                'cancel_url'=>route('paypal.cancel'),
                'invoice_id'=>uniqid(),
                'invoice_description'=>'order description',
                'total'=>$cart->getTotal(),
        ];
        return $checkout_data;
    }
    public function getExpressCheckoutSuccess(Request $request,$orederId){
        $token=$request->get('token');
        $payerId=$request->get('payerId');
        $checkout_data=$this->checkoutData($orederId);
        $provider= PayPal::setProvider();
        $response=$provider->getExpressCheckoutDetails($token);
        if (in_array(strtoupper($response['ACK']),['SUCCESS','SUCCESSWITHWARNING'])) {
            $payment_status=$provider->doExpressCheckoutPayment($checkout_data,$token,$payerId);
            $status=$payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];
            if(in_array($status,['completed','processing'])){
            $order=Order::find($orederId);
            $order->is_paid=1;
            $order->save();
            
            //send mail
            Mail::to($order->user->email)->send(new OrderPaid($order));

            Toastr::suceess('Payment successfully done.','success');
            return redirect()->route('home');
            }

        }
        Toastr::error('Payment not done.Something went wrong','Error');
        return redirect()->route('home');
    }

    public function cancelPage(){
        dd('payment failed');
    }
}

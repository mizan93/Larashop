<?php

namespace App\Http\Controllers;

use App\Product;
use Brian2694\Toastr\Facades\Toastr;
use Brian2694\Toastr\Toastr as ToastrToastr;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(){
           $products=\Cart::session(auth()->id())->getContent();
       return view('cart',compact('products'));
    }
    public function addToCart(Product $product){

        \Cart::session(auth()->id())->add(array(
    'id' => $product->id,
    'name' => $product->name,
    'code' => $product->code,
    'price' => $product->price,
    'quantity' => 1,
    'image' => $product->image,
    'attributes' => array(),
    'associatedModel' => $product
));

return redirect()->route('cart');
    }

    public function update($id){
        \Cart::session(auth()->id())->update($id,[
            'quantity' =>array(
                'relative' => false,
                'value' => request('quantity')
            ),

        ]);
        return redirect()->back();

    }

    public function remove($id){
        \Cart::session(auth()->id())->remove($id);
        Toastr::success('product deleted :)', 'Success');
        return redirect()->back();


    }
    public function checkout(){
        $products=\Cart::session(auth()->id())->getContent();

        return view('checkout',compact('products'));
    }

}

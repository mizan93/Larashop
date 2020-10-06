<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Brian2694\Toastr\Facades\Toastr;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(){
           $products=\Cart::session(auth()->id())->getContent();
       return view('cart',compact('products'));
    }
    public static function checkout(){
        //    $products= Order::userOrder();

        $products=\Cart::session(auth()->id())->getContent();
        if (!empty($products)) {

            return view('checkout',compact('products'));

        } else {
            Toastr::warning('please add item to Cart first :)', 'warning');
            return redirect()->back();
        }

        }
    public function addToCart(Product $product){

        \Cart::session(auth()->id())->add(array(
    'id' => $product->id,
    'name' => $product->name,
    'slug' => $product->slug,
    'code' => $product->code,
    'price' => $product->price,
    'quantity' => 1,
    'image' => $product->image,
    'attributes' => array(),
    'associatedModel' => $product
));
Toastr::success('Product added to cart :)', 'Success');

return redirect()->back();
    }

    public function update($id){
        \Cart::session(auth()->id())->update($id,[
            'quantity' =>array(
                'relative' => false,
                'value' => request('quantity')
            ),

        ]);
        Toastr::success('Cart updated :)', 'Success');

        return redirect()->back();

    }

    public function remove($id){
        \Cart::session(auth()->id())->remove($id);
        Toastr::success('product deleted :)', 'Success');
        return redirect()->back();

    }


}

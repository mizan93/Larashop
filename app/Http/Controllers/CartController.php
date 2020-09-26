<?php

namespace App\Http\Controllers;

use App\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(){
return view('cart');
    }
    public function addToCart(Product $product){
 \Cart::session(auth()->id())->add(array(
    'id' => $rowId,
    'name' => $Product->name,
    'price' => $Product->price,
    'quantity' => 4,
    'attributes' => array(),
    'associatedModel' => $Product
));
    }
    public function update($id){

    }
    public function remove($id){

    }

}

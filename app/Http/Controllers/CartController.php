<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use App\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\FuncCall;

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
    public function profile(){
         $profile=Auth()->user();
        // return $order=Order::all()->user()->orders();



         return view('profile',compact('profile'));
    }
    public function updateProfile(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'required|image',
        ]);

        $image=$request->file('image');
        $slug=Str::slug($request->name);
        $user=User::findOrFail(Auth::id());
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('profile'))
            {
             Storage::disk('public')->makeDirectory('profile');
            }
//            Delete old image form profile folder
            if (Storage::disk('public')->exists('profile/'.$user->image))
            {
                Storage::disk('public')->delete('profile/'.$user->image);
            }
            $profile = Image::make($image)->resize(500,500)->stream();
            Storage::disk('public')->put('profile/'.$imageName,$profile);
        } else {
            $imageName = $user->image;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $imageName;
        $user->about = $request->about;
        $user->save();
        Toastr::success('Profile Successfully Updated :)','Success');
        return redirect()->back();
    }
    public function updatePassword(Request $request){
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        $haspassword=Auth::user()->password;
        if (Hash::check($request->old_password, $haspassword)) {
            if (!Hash::check($request->password,$haspassword)) {
                $user=User::findOrFail(Auth::id());
                $user->password=Hash::make($request->password);
                $user->save();
                Toastr::success('Password Successfully Changed :)', 'Success');
                Auth::logout();
                return redirect()->back();

            } else {
                Toastr::error('New password can not be same as old password :)', 'Error');
                return redirect()->back();
            }

        }else{
            Toastr::error('Cureent  password not match :)', 'Error');
            return redirect()->back();
        }
    }


}

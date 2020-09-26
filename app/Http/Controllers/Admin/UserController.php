<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use PDO;

class UserController extends Controller
{
   public function index(){
    $users=User::where('role','=','user')->get();
     return view('admin.user.index',compact('users'));
   }
   public function destroy($id){
    $user=User::find($id);
$user->delete();
    Toastr::success('User has been Deleted :)', 'Success');

     return redirect()->back();
   }
}

<?php

namespace App\Http\Controllers;

use App\Carts;
use App\Products;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class CartController extends Controller
{
   public  function  cart()
   {
       return view('carts.checkout');
   }

    public function addCart()
    {
        $inputs=\Request::all();
        $productId=$inputs['product_id'];
        $token = bin2hex(random_bytes(50));
        $user = User::all();
       $userId=$user['user_id'];
        dd($userId);
        //session(['user_id' => $user->user_id]);


        //$cart=Carts::create(['cart_id']);


    }


}

<?php

namespace App\Http\Controllers;

use App\Carts;
use App\Products;
use App\User;
use Session;
use Illuminate\Http\Request;

use App\Http\Requests;

class CartController extends Controller
{
    public function  cart()
    {
        return view('carts.checkout');
    }

    public function addCart()
    {
        $inputs = \Request::all();
        $productId = $inputs['product_id'];
        $token = bin2hex(random_bytes(50));
        Session(['token' => $token]);
        $cart=Carts::create([
        'user_id' =>$token,
        'product_id'=>$productId,
        'quantity'=>1]);
        $quantity=$cart['quantity'];
        $carts = Carts::where('user_id', $token)
           ->where('product_id' , $productId)->select(['quantity'])->first();
        if($cart['quantity']==1)
        {
            $carts->update(['quantity' => 2]);
        }else{
            $cart=Carts::create([
                'user_id' =>$token,
                'product_id'=>$productId,
                'quantity'=>1]);
        }

    }
}







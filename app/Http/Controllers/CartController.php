<?php

namespace App\Http\Controllers;

use App\Carts;
use App\Products;
use App\User;
use Session;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;

class CartController extends Controller
{
    public function  cart()
    {
       $cartObj =new Carts();
       $cartPrice=$cartObj->getCartData();

       /*$cartPriceObj =new Carts();
        $totalPrice=$cartPriceObj->getTotalPrice($quantity,$cartPrice);
        dd($totalPrice);*/
        return view('carts.checkout',compact('cartPrice'));
    }



    public function addCart()
    {
        $inputs = \Request::all();
        $productId = $inputs['product_id'];
        $token = '';
      // Session(['user_id' => $token]);
        if(!Session('user_id')) {
            $token = bin2hex(random_bytes(50));
            Session(['user_id' => $token]);
        } else {
            $token = Session('user_id');
        }

        $carts = Carts::where('user_id', $token)
            ->where('product_id' , $productId)->select(['quantity'])->first();
        if($carts){
            $quantity=$carts['quantity']+1;
            Carts::where('user_id', $token)
                ->where('product_id' , $productId)->update(['quantity' => $quantity]);

        } else {
            $cart=Carts::create([
                'user_id' =>$token,
                'product_id'=>$productId,
                'quantity'=>1]);
        }

    }
}







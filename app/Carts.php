<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $table='carts';

    protected $primaryKey ='cart_id';

    protected $fillable =['user_id','product_id','quantity'];

    public function getCartData()
    {
     return $this
            ->join('products', 'products.product_id', '=', 'carts.product_id')
            ->select(['products.price',
                'products.product_name',
                'carts.product_id',
                'carts.quantity',
            ])
            ->get();



    }


       /* public function getTotalPrice($quantity,$cartPrice) {
          $aa= $this->sum(Carts::where('quantity',$quantity)
          ->where('price',$cartPrice)
            ->sum('quantity * price'));
            dd($aa);
        }*/

}



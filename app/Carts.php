<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $table='carts';

    protected $primaryKey ='cart_id';

    protected $fillable =['user_id','product_id','quantity','token'];
}

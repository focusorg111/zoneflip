<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table='product_images';

    protected $primaryKey ='image_id';

    protected $fillable =['product_id','product_image','is_main_image'];
}


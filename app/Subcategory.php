<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table='subcategories';

    protected $primaryKey ='subcategory_id';

    protected $fillable =['category_id','subcategory_name','is_active'];
}

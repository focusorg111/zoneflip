<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table='vendors';

    protected $primaryKey ='vendor_id';

    protected $fillable =['description','address','company_name','register_date','is_approved','user_id'];
}

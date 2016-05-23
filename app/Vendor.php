<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table='vendors';

    protected $primaryKey ='vendor_id';

    protected $fillable =['first_name','last_name','user_name','password','contact_no','email_address'];
}

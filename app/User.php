<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table='users';

    protected $primaryKey ='user_id';

    protected $fillable = [
        'first_name', 'last_name','user_name', 'password','contact_no','user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRegisterData()
    {
            return $this
            ->join('vendors', 'users.user_id', '=', 'vendors.user_id')
            ->select(['users.user_id',
                'users.first_name',
                'users.last_name',
                'vendors.company_name',
                'vendors.register_date',
                \DB::raw('CONCAT(First_Name, " ", Last_Name) AS full_name'
                )])
            ->paginate(2);

    }
    public function getVenderDetail($id)
    {
            return $this->join('vendors', 'users.user_id', '=', 'vendors.user_id')->where('users.user_id',$id)
            ->first();

    }
}

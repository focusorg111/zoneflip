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

    /**
     * Get Register data
     * @param int $status
     * @return mixed
     */
    public function getRegisterData($status=0)
    {
            return $this
            ->join('vendors', 'users.user_id', '=', 'vendors.user_id')
                ->where('vendors.is_approved',$status)
            ->select(['users.user_id',
                'users.first_name',
                'users.last_name',
                'vendors.company_name',
                'vendors.register_date',
                'vendors.is_approved',
                \DB::raw('CONCAT(First_Name, " ", Last_Name) AS full_name'
                )])
            ->paginate(5);

    }

    /**
     * Vender Detail
     * @param $id
     * @return mixed
     */
    public function getVenderDetail($id)
    {
            return $this->join('vendors', 'users.user_id', '=', 'vendors.user_id')->where('users.user_id',$id)
            ->first();

    }
}

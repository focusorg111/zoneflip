<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class AdminController extends Controller
{
    /**
     * add registerlist
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public  function registerList()
    {

        $userObject = (new User());
        $users=$userObject->getRegisterData();
        return view('admin.register_venderlist',compact('users'));
    }
    public function getRegisterDetail($id)
    {
        $userOjb = (new User());
        $userInfo = $userOjb->getVenderDetail($id);
        return view('admin.seller_detail',compact('userInfo'));
    }
    public function checkIsApprove()
    {
        $inputs= \Request::all();
        $userId =$inputs['user_id'];
        Vendor::where('user_id',$userId)->update(['is_approved'=>1]);

    }

}

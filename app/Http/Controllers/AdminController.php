<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * add registerlist
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public  function registerList()
    {
        try{
            \DB::beginTransaction();
            $inputs=\Request::all();
            $status= isset($inputs['approved_status'])?$inputs['approved_status']:0;
            $userObject = (new User());
            $users=$userObject->getRegisterData($status);
            return view('admin.register_venderlist',compact('users','status'));
            \DB::commit();
        }catch (\Exception $e) {
            \DB::rollback();

        }
    }

    /**
     * Get vender detail
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRegisterDetail($id)
    {
        try {
            \DB::beginTransaction();
            $userOjb = (new User());
            $userInfo = $userOjb->getVenderDetail($id);
            return view('admin.seller_detail', compact('userInfo'));
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();

        }
    }

    /**
     * Update Approve
     * @return mixed
     */
    public function checkIsApprove()
    {
        try {
            \DB::beginTransaction();
            $inputs= \Request::all();
            $userId =$inputs['user_id'];
            $vendorStatus=$inputs['vendor_status'];
            if($vendorStatus!=1){
             $status=2;
            }
           else{
            $status=1;
           }
        Vendor::where('user_id',$userId)->update(['is_approved'=>$status]);
            \DB::commit();
       return Redirect::to(route('get.venderlist'));

        } catch (\Exception $e) {
            \DB::rollback();

        }

    }
}

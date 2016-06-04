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
        $inputs=\Request::all();
        $status= isset($inputs['approved_status'])?$inputs['approved_status']:0;
        $userObject = (new User());
        $users=$userObject->getRegisterData($status);
        return view('admin.register_venderlist',compact('users','status'));
        } catch (\Exception $e) {
            return alert_messages();
        }
    }

    /**
     * Get vender detail
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getRegisterDetail($id)
    {

            $userOjb = (new User());
            $userInfo = $userOjb->getVenderDetail($id);
            return view('admin.seller_detail', compact('userInfo'));

    }

    /**
     * Update Approve
     * @return mixed
     */
    public function checkIsApprove()
    {
        try {

            $inputs = \Request::all();
            $userId = $inputs['user_id'];
            $vendorStatus = $inputs['vendor_status'];
            if ($vendorStatus != 1) {
                $status = 2;
            } else {
                $status = 1;
            }
            Vendor::where('user_id', $userId)->update(['is_approved' => $status]);

            return Redirect::to(route('get.venderlist'));

        } catch (\Exception $e) {
            return alert_messages();
        }
    }
}

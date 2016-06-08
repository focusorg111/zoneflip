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
            $user= new User();
            $vendors=$user->getVendorlist();
            if($status=1){
                try{
                    \Mail::send('seller.response_email', array('first_name'=>$vendors['first_name']), function($message) use ($vendors){
                        $message->to($vendors['user_name'])->subject('Approved Email');
                    });
                }
                catch (\Exception $e) {
                   // dd($e->getMessage());
                }
            }
            return Redirect::to(route('get.venderlist'))->with('flash_message', 'Successfully Approved.')
                ->with('flash_type', 'alert-success');
        } catch (\Exception $e) {
            return alert_messages();
        }
    }
}

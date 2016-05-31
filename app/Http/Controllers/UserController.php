<?php

namespace App\Http\Controllers;

use App\User;
use App\Vendor;
use Session;
use App\Helper;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ChangePasswordRequest;


class UserController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function login()
    {
        return view('admin.login');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function register()
    {

        return view('seller.register');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function store(Request $request)
    {

         $inputs = \Request::all();
         $pwd = bcrypt($inputs['password']);
        $userType= \Config::get('constants.USER_TYPE.SELLER');
         $userData = User::create([
             'first_name'=> $inputs['first_name'],
             'last_name'=> $inputs['last_name'],
             'user_name'=> $inputs['user_name'],
             'password'=> $pwd,
             'contact_no' => $inputs['contact_no'],
             'user_type'=>$userType
         ]);
         $user_id = $userData['user_id'];
         Vendor::create(['user_id' => $user_id,'company_name' => $inputs['company_name'],'register_date'=> $inputs['register_date'],'is_approved'=> 0]);
         return view('seller.register')->with('message','Success');

    }

    /**
     * Add Login
     * @param Request $request
     * @return mixed
     */

    public function addLogin(LoginRequest $LoginRequest)
    {

        $credentials = array(
            'user_name' => Input::get('user_name'),
            'password' => Input::get('password')
        );
        if (\Auth::attempt($credentials)) {
            $user=\Auth::user();
            if($user['user_type']==1){
                return Redirect::to(route('dashboard'));
            }
            elseif($user['user_type']==2)
            {
                $userId=$user['user_id'];
                $vender=Vendor::where('user_id',$userId)->select('vendor_id','is_approved')->first();
                $vender->vendor_id;
               if('is_approved'==0)
               {
                   return Redirect::to(route('login'));
               }
                else{

                    return Redirect::to(route('dashboard'));
                }
            }
        }

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changePassword()
    {
       return view('common.change_password');
    }
    public function updateChangePassword(ChangePasswordRequest $ChangePasswordRequest)
    {
        $inputs =\Request::all();
        $user = \Auth::user();
        if (\Hash::check($inputs['current_password'], $user->password))
        {
            $password = bcrypt($inputs['new_password']);
            User::where('user_id', $user->user_id)->update(['password' => $password]);
            return Redirect::to(route('change.password'))->withSuccess('Your password has been updated');
        }
        else
        {
            return Redirect::to(route('login'));
        }

    }

    /**
     * Logout
     * @return mixed
     */
    public function logout()
    {
        \Auth::logout();
        return Redirect::route('login');

    }


}




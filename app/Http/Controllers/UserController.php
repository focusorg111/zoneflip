<?php

namespace App\Http\Controllers;

use App\User;
use App\Vendor;
use Session;
use App\Helper;
use Carbon\Carbon;
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

    public function store()
    {

         $inputs = \Request::all();
        $current = date('Y-m-d');
         $pwd = bcrypt($inputs['password']);
         $userData = User::create([
             'first_name'=> $inputs['first_name'],
             'last_name'=> $inputs['last_name'],
             'user_name'=> $inputs['user_name'],
             'password'=> $pwd,
             'contact_no' => $inputs['contact_no']
         ]);
         $user_id = $userData['user_id'];
         Vendor::create(['user_id' => $user_id,'company_name' => $inputs['company_name'],'address'=> $inputs['address'],'register_date'=> $current,'is_approved'=> 0]);
         return view('seller.register');

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
            return Redirect::to(route('dashboard'));
        }
        else{
            return Redirect::to('login');
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




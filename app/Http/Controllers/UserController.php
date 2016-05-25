<?php

namespace App\Http\Controllers;

use App\User;
use App\Vendor;
use Session;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


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
         $userData = User::create([
             'first_name'=> $inputs['first_name'],
             'last_name'=> $inputs['last_name'],
             'user_name'=> $inputs['user_name'],
             'password'=> $pwd,
             'contact_no' => $inputs['contact_no']
         ]);
         $user_id = $userData['user_id'];
         Vendor::create(['user_id' => $user_id,'company_name' => $inputs['company_name'],'register_date'=> $inputs['register_date'],'is_approved'=> 0]);
         return view('seller.register')->with('message','Success');;

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
     * Logout
     * @return mixed
     */
    public function logout()
    {
        \Auth::logout();
        return Redirect::route('login');

    }
}




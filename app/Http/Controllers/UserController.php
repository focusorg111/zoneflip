<?php

namespace App\Http\Controllers;

use App\User;
use App\Vendor;
use Illuminate\Http\Request;

use App\Http\Requests;
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
     * Add Login
     * @param Request $request
     * @return mixed
     */


    public function register()
    {
        return view('seller.register');
    }

    public function store()
    {
        $inputs = \Request::all();
        print_r($inputs);
        //$userData = User::create([]);
        $userData = User::create(['first_name'=> $inputs['first_name'],'last_name'=> $inputs['last_name'],'user_name'=> $inputs['user_name'],'password'=> $inputs['password'],'contact_no' => $inputs['contact_no'],'user_id'=> $inputs['user_id']]);
        $user_id = $userData['user_id'];
       Vendor::create(['description' => $inputs['description'],'address' => $inputs['address'],'user_id' => $inputs['user_id'],'company_name' => $inputs['company_name'],'register_date'=> $inputs['register_date'],'is_approved'=> $inputs['is_approved']]);
    }


    public function addLogin(Request $request)
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




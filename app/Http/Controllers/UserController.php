<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard');
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('admin.login');
    }


    public function register()
    {
        return view('seller.register');
    }

    public function store()
    {
        $inputs = \Request::all();
        //print_r($inputs);
        Vendor::create($inputs);
    }

    public function addLogin(Request $request)
    {
        $credentials = array(
            'user_name' => Input::get('email'),
            'password' => Input::get('password')
        );
        if (\Auth::attempt($credentials)) {
            return Redirect::to(route('admin.index'));
        }
        else{
            return Redirect::to('login');
        }
    }
    public function logout()
    {
        \Auth::logout();
        return Redirect::route('login');

    }
}




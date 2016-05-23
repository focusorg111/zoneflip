<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
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
}




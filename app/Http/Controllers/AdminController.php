<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public  function registerList()
    {
        return view('admin.register_venderlist');
    }
}

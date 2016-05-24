<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    /**
     * add registerlist
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public  function registerList()
    {
        return view('admin.register_venderlist');
    }
}

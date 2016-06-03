<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        try {
            \DB::beginTransaction();
            return view('dashboard.dashboard');
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();

        }
    }

}

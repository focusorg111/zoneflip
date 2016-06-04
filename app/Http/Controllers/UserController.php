<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use App\User;
use App\Vendor;
use Mockery\CountValidator\Exception;
use Session;
use App\Helper;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Validation;



class UserController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('user.index', compact('categories', 'subcategories'));


    }

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
    public function registerView()
    {


        return view('common.first_register');


    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {

        return view('seller.register');
    }

    /**
     * store data in the database
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(RegisterRequest $registerRequest)
    {

        $inputs = \Request::all();
        $current = date('Y-m-d');
        $pwd = bcrypt($inputs['password']);
        $userType = \Config::get('constants.USER_TYPE.SELLER');
        $userData = User::create([
            'first_name' => $inputs['first_name'],
            'last_name' => $inputs['last_name'],
            'user_name' => $inputs['user_name'],
            'password' => $pwd,
            'contact_no' => $inputs['contact_no'],
            'user_type' => $userType
        ]);
        $user_id = $userData['user_id'];
        Vendor::create(['user_id' => $user_id, 'company_name' => $inputs['company_name'], 'address' => $inputs['address'], 'register_date' => $current, 'is_approved' => 0]);
        return Redirect(route('seller.register'))->with('flash_message', 'You Are Successfully Register')
            ->with('flash_type', 'alert-success');
        \DB::commit();

    }

    /**
     * Add Login
     * @param Request $request
     * @return mixed
     */

    public function addLogin(LoginRequest $loginRequest)
    {

        try {
            \DB::beginTransaction();
            $credentials = array(
                'user_name' => Input::get('user_name'),
                'password' => Input::get('password')
            );
            if (\Auth::attempt($credentials)) {
                $user = \Auth::user();
                if ($user['user_type'] == 1) {
                    return Redirect::to(route('dashboard'));
                } elseif ($user['user_type'] == 2) {
                    $userId = $user['user_id'];
                    $vendor = Vendor::where('user_id', $userId)->select('vendor_id', 'is_approved')->first();
                    $vendor->vendor_id;
                    if ($vendor->is_approved == 1) {
                        session(['vendor_id' => $vendor->vendor_id]);
                        return Redirect::to(route('dashboard'));
                    } else {
                        \Auth::logout();
                        return Redirect::to(route('login'));
                    }
                }
            } else {
                return Redirect::to(route('login'))
                    ->with('flash_message', 'Invalid Login')
                    ->with('flash_type', 'alert-danger');;
            }

        }catch (Exception $e)
        {
        }
    }



    /**
     * change the password
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changePassword()
    {

        $user = \Auth::user();
       return view('common.change_password');

    }

    /**
     * update the password
     * @param ChangePasswordRequest $ChangePasswordRequest
     * @return mixed
     */
    public function updateChangePassword(ChangePasswordRequest $ChangePasswordRequest)
    {

            $inputs = \Request::all();
            $user = \Auth::user();
            if (\Hash::check($inputs['current_password'], $user->password)) {
                $password = bcrypt($inputs['new_password']);
                User::where('user_id', $user->user_id)->update(['password' => $password]);
                return Redirect::to(route('change.password'))
                    ->with('flash_message', 'Password Successfully Changed')
                    ->with('flash_type', 'alert-success');
            } else {
                return Redirect::to(route('login'));
            }
            \DB::commit();

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




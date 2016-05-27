<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subcategory;
use App\Products;
use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ProductRequest;




class ProductController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

  public  function create()
  {
      $category = Category::lists('category_name','category_id')->toArray();
      $subCategory = Subcategory::lists('subcategory_name','subcategory_id')->toArray();
      return view('products.create_product',compact('category','subCategory'));
  }

    /**
     * store data in the datadbase
     */
    public function  store()
    {
        $inputs = \Request::all();
        $users = \Auth::user();
        $usersID =$users['user_id'];
        Products::create([
            'product_name' => $inputs['product_name'],
            'category_id' => $inputs['category_id'],
            'subcategory_id' => $inputs['subcategory_id'],
            'price' => $inputs['price'],
            'quantity' => $inputs['quantity'],
            'discount' => $inputs['discount'],
            'product_description' => $inputs['product_description'],
            'created_by'  =>$usersID,
            'updated_by' =>$usersID
            ]);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public  function  productSubcategory()
    {
        $inputs = \Request::all();
        $catId = $inputs['subcategory_id'];
        $subCats = Subcategory::where('category_id',$catId)->get();
        return view('products.subcategory_list', compact('subCats'));
    }


    public function productDetils()
    {
        $productOjb = (new Products());
        $productInfos = $productOjb->getProductData();
        return  view('products.product_detail',compact('productInfos'));
    }





    public function manageImage()
    {
        return view('products.manage_image');
    }
    public function uploadImage()
    {
            $input = Input::all();
            $destinationPath = public_path() . '/product_image';
            $extension = Input::file('file')->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $upload_success = Input::file('file')->move($destinationPath, $fileName);
            

    }

}

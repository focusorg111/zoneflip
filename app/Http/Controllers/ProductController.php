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
use App\ProductImage;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('index.index');
    }

    /**
     * create product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

  public  function create()
  {
      try {
          \DB::beginTransaction();
          $category = Category::lists('category_name','category_id')->toArray();
          $subCategory = Subcategory::lists('subcategory_name','subcategory_id')->toArray();
           return view('products.create_product',compact('category','subCategory'));
          \DB::commit();
      } catch (\Exception $e) {
          \DB::rollback();

      }
  }

    /**
     * store data in the datadbase
     */
    public function  store(ProductRequest $productRequest )
    {
        try {
            \DB::beginTransaction();
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
            'updated_by' =>$usersID,
            'vendor_id'=>session('vendor_id')
            ]);

             return Redirect::to(route('get.product-list'));
            \DB::commit();
            } catch (\Exception $e) {
              \DB::rollback();
        }
    }

    /**
     * get sub-category list
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function  productSubcategory()
    {
        try {
            \DB::beginTransaction();
            $inputs = \Request::all();
            $catId = $inputs['category_id'];
            $subCats = Subcategory::where('category_id',$catId)->get();
            return view('products.subcategory_list', compact('subCats'));
            \DB::commit();
            } catch (\Exception $e) {
            \DB::rollback();

        }
    }

    /**
     * show the product detail list
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function productDetails()
    {
        try {
            \DB::beginTransaction();
            $inputs=\Request::all();
            $cat= isset($inputs['category_id'])?$inputs['category_id']:'';
            $sub= isset($inputs['subcategory_id'])?$inputs['subcategory_id']:'';
            $category = Category::lists('category_name','category_id')->toArray();
            $subCategory = Subcategory::where('category_id',$cat)->lists('subcategory_name','subcategory_id')->toArray();
            $productOjb = (new Products());
            $productInfos = $productOjb->getProductData($cat,$sub);
            return  view('products.product_detail',compact('productInfos','category','subCategory','cat','sub','users'));
            \DB::commit();
            } catch (\Exception $e) {
            \DB::rollback();

         }
    }
    /**
     * show sub-category list
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showSubcategoryList()
    {
        try {
            \DB::beginTransaction();
            $inputs = \Request::all();
            $catId = $inputs['category_id'];
            $subCats = Subcategory::where('category_id',$catId)->get();
            return view('products.subcategory_list', compact('subCats'));
             \DB::commit();
            } catch (\Exception $e) {
            \DB::rollback();

        }
    }

    /**
     * edit the product
     * @param $product_id
     * @return mixed
     */
    public  function edit($product_id)
    {
        try {
        \DB::beginTransaction();
        $product = Products::find($product_id);
        $category = Category::lists('category_name','category_id')->toArray();
        $subCategory = Subcategory::where('category_id',$product->category_id)->lists('subcategory_name','subcategory_id')->toArray();
        return view('products.product_edit',compact('product','category','subCategory','product_id'));
        \DB::commit();
         } catch (\Exception $e) {
        \DB::rollback();
        }
    }

    /**
     * update the product
     * @return mixed
     */
    public function update()
    {
        try {
            \DB::beginTransaction();
           $inputs = \Request::all();
            $prodId = $inputs['product_id'];
             Products::where('product_id',$prodId)->update(['product_name' =>$inputs['product_name'],
            'category_id' =>$inputs['category_id'],
            'subcategory_id'=> $inputs['subcategory_id'],
            'price'=>$inputs['price'],
            'quantity'=>$inputs['quantity'],
            'discount'=>$inputs['discount'],
            'product_description'=> $inputs['product_description']
            ]);
            return Redirect::route('get.product-list');
            \DB::commit();
             } catch (\Exception $e) {
            \DB::rollback();
        }
    }

    /**
     *
     * @param $product_id
     * @return mixed
     */
    public function manageImage($product_id)
    {
        try {
            \DB::beginTransaction();
             $productOjb = (new Products());
             $products = $productOjb->isValidProduct($product_id);
             if($products){
            $productImages = ProductImage::where('product_id',$product_id)->get();
            return view('products.manage_image',compact('productImages','product_id','products'));
            }
            else{
            return response('Unauthorized.', 401);
             }
            \DB::commit();
            } catch (\Exception $e) {
            \DB::rollback();
        }
    }

    /**
     * Upload Image
     * upload the image
     */
    public function uploadImage()
    {
        try {
            \DB::beginTransaction();
            $input = Input::all();
            $productId = $input['product_id'];
            $destinationPath = public_path() . '/assets/product_image';
            $extension = Input::file('file')->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $upload_success = Input::file('file')->move($destinationPath, $fileName);
            ProductImage::create(['product_image' => $fileName, 'product_id' => $productId]);
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
        }

    }


    /**
     * Set main Image and Delete
     * update main image
     * @return mixed
     */
    public function updateMainImage()
    {
        try {
            \DB::beginTransaction();
        $inputs = \Request::all();
       $products= ProductImage::where('product_id', $inputs['product_id'])
            ->where('image_id', $inputs['image_id']);
        if ($inputs['type'] == 1)
        {

            $products->update(['is_main_image' => 1]);
        }
        elseif ($inputs['type'] == 2)
        {
            $products->update(['is_main_image' => 0]);
        }
        elseif ($inputs['type'] == 0)
        {
            $productimage = ProductImage::where('image_id', $inputs['image_id'])->select('product_image')->first();
            $filename=$productimage['product_image'];
            $fullPath = public_path() . '/assets/product_image';
            $image=$fullPath.'/'.$filename;
            if (\File::exists($image)) {
                unlink($image);
                ProductImage::where('image_id', $inputs['image_id'])->delete();
            }
        }
        return Redirect::to(route('product.manage-image', $inputs['product_id']));
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
        }
    }

    /**
     * @param $subcategory_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function productList($subcategory_id)
    {
        $productOjb = (new Products());
        $products = $productOjb->getProductList($subcategory_id);
        $image = Products::with(['productimage'])->get();
        dd($image);
        return view('products.product',compact('products','image'));
    }

}

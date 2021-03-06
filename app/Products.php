<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table='products';

    protected $primaryKey ='product_id';

    protected $fillable =[
        'product_name',
        'product_description',
        'price',
        'quantity',
        'product_size',
        'discount',
        'vendor_id',
        'category_id',
        'subcategory_id',
        'created_by',
        'updated_by',
    ];

    /**
     * get product data
     * @param $cat
     * @param $sub
     * @return mixed
     */
    public function getProductData($cat,$sub)
    {
      $query= $this
            ->join('categories', 'categories.category_id', '=', 'products.category_id')
            ->join('subcategories', 'subcategories.subcategory_id', '=', 'products.subcategory_id')
          ->where('vendor_id',session('vendor_id'))
            ->select(['categories.category_name',
            'subcategories.subcategory_name',
                'products.product_name',
                'products.quantity',
                'products.price',
                'products.product_id'
            ]);

        if ($cat>=1)
            $query->where('products.category_id', '=', $cat);
        if ($sub>=1)
            $query->where('products.subcategory_id', '=', $sub);
        $result = $query->paginate(4);
        return $result;


    }
    public function isValidProduct($product_id)
    {
        return $this
            ->where('vendor_id',session('vendor_id'))
            ->where('products.product_id',$product_id)
            ->select(['products.product_name'])
            ->first();
    }
    public  function getProductList($subcategory_id,$minimun,$maximum)
    {
        $query=  $this
            ->where('products.subcategory_id',$subcategory_id)
            ->with('productimage')
            ->select([
                'products.product_id',
                'products.product_name',
                'products.price',
                'products.discount',
                'products.created_at',
                'products.subcategory_id',
                'products.category_id',

            ]);
        if($minimun && $maximum){
            $query->whereBetween('products.price',[$minimun,$maximum]);
        }
            $result = $query
            ->orderby('created_at','desc')
            ->limit(2)
            ->get();
         return $result;
    }
    public function productimage()
    {
        return $this->hasOne(ProductImage::class, 'product_id')->where('is_main_image',1);
    }

    public function quickProductImage()
    {
        return $this->hasMany(ProductImage::class, 'product_id')->orderby('is_main_image',1);
    }

    public function getSearchProduct()
    {
        return $this
            ->join('categories', 'categories.category_id', '=', 'products.category_id')
            ->select(['categories.category_name',
                'products.product_id',
                'products.product_name']);
    }
    public function getRecentProductList()
    {
        return $this
            ->with('recentProduct')
            ->select([
                'product_id',
                'product_name',
                'price',
                'discount',
                'created_at'
            ])
            ->orderby('created_at','desc')->limit(10)
            ->get();

    }
    public function recentProduct()
    {
        return $this->hasOne(ProductImage::class, 'product_id')->where('is_main_image',1);

    }
    public function getRProductList($productId)
    {
        return $this
            ->where('product_id','<',$productId)
            ->with('recentRProduct')
            ->select([
                'product_id',
                'product_name',
                'price',
                'discount',
                'created_at'
            ])
            ->orderby('created_at','desc')->limit(10)
            ->get();

    }
    public function recentRProduct()
    {
        return $this->hasOne(ProductImage::class, 'product_id')->where('is_main_image',1);

    }
    public  function getProduct($productId,$subcategoryId)
    {
        return $this
            ->where('product_id','<',$productId)
            ->where('products.subcategory_id',$subcategoryId)
            ->with('product')
            ->select([
                'products.product_id',
                'products.product_name',
                'products.price',
                'products.discount',
                'products.created_at'
            ])
            ->orderby('created_at','desc')
            ->get();

    }
public function product()
{
    return $this->hasOne(ProductImage::class, 'product_id')->where('is_main_image',1);
}
}

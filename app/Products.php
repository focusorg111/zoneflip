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
    public  function getProductList($subcategory_id)
    {
        return $this
            ->join('product_images','product_images.product_id', '=', 'products.product_id')
            ->where('products.subcategory_id',$subcategory_id)
            ->select(['product_images.product_image',
                'products.product_name',
                'products.price',
                'products.discount',
                'product_images.is_main_image'
            ])->get();
    }
    public function productimage()
    {
        return $this->hasOne(ProductImage::class, 'product_id');
    }
}

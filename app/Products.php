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

    public function getProductData($cat,$sub)
    {
      $query= $this
            ->join('categories', 'categories.category_id', '=', 'products.category_id')
            ->join('subcategories', 'subcategories.subcategory_id', '=', 'products.subcategory_id')
            ->select(['categories.category_name',
            'subcategories.subcategory_name',
                'products.product_name',
                'products.price',

            ]);
        if ($cat>1)
            $query->where('products.category_id', '=', $cat);

        if ($sub>1)
            $query->where('products.subcategory_id', '=', $sub);
        $result = $query->get();
        return $result;

    }
}

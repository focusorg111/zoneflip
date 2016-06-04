<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      //  \DB::table('categories')->truncate();
        //\DB::table('subcategories')->truncate();
        $categoryId = \DB::table('categories')->insertGetId([
            'category_name' => 'all watches',

        ]);

        \DB::table('subcategories')->insert([
            ['category_id' => $categoryId, 'subcategory_name' => 'sonata'],
            ['category_id' => $categoryId, 'subcategory_name' => 'titan'],
            ['category_id' => $categoryId, 'subcategory_name' => 'maxima'],
            ['category_id' => $categoryId, 'subcategory_name' => 'timax'],
            ['category_id' => $categoryId, 'subcategory_name' => 'tomtom']

        ]);

        $categoryId = \DB::table('categories')->insertGetId([
            'category_name' => 'all clothing',

        ]);

        \DB::table('subcategories')->insert([
            ['category_id' => $categoryId, 'subcategory_name' => 'T-shirt'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Shirt'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Jeans'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Sport Wear'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Trousers'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Suits and Blazers'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Kurtas, Sherwani and set']

        ]);

        $categoryId = \DB::table('categories')->insertGetId([
            'category_name' => 'all footwear',
        ]);

        \DB::table('subcategories')->insert([
            ['category_id' => $categoryId, 'subcategory_name'=> 'Casual Shoes'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Sports Shoes'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Flat'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Heels'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Boots'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Wedges'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Slippers and Filp-Flops']

        ]);

        $categoryId = \DB::table('categories')->insertGetId([
            'category_name' => 'all bags, belts and wallets',

        ]);

        \DB::table('subcategories')->insert([
            ['category_id' => $categoryId, 'subcategory_name' => 'Handbages'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Sling Bages'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Laptop Bages'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Wallets'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Belts'],

        ]);

        $categoryId = \DB::table('categories')->insertGetId([
            'category_name' => 'kids and baby clothes',

        ]);

        \DB::table('subcategories')->insert([
            ['category_id' => $categoryId, 'subcategory_name' => 'Girls Clothing'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Boys Clothing'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Baby Girls Clothing'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Baby Boys Clothing'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Schools Bages'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Lunch Box'],


        ]);

        $categoryId = \DB::table('categories')->insertGetId([
            'category_name' => 'electronics',

        ]);

        \DB::table('subcategories')->insert([
            ['category_id' => $categoryId, 'subcategory_name' => 'mobile'],
            ['category_id' => $categoryId, 'subcategory_name' => 'laptops'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Computer Accessories'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Tablets'],
            ['category_id' => $categoryId, 'subcategory_name' => 'Mobile Accessories'],
        ]);
    }

}

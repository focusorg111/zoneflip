<?php

use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_type'=> \Config::get('constants.USER_TYPE.SELLER'),
            'user_name' => 'seller@gmail.com',
            'password' => bcrypt('seller123'),
        ]);
    }

}

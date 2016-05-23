<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_type'=> \Config::get('constants.USER_TYPE.SUPER_ADMIN'),
            'user_name' => 'superadmin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);
    }
}

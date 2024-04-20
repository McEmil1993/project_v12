<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=array(
            array(
                'name'=>'Admin',
                'email'=>'admin@admin.com',
                'password'=>Hash::make('1234'),
                'role'=>'admin',
                'status'=>'active'
            ),
            array(
                'name'=>'Store A',
                'email'=>'store@store.com',
                'password'=>Hash::make('1234'),
                'role'=>'store',
                'status'=>'active'
            ),
            array(
                'name'=>'Customer A',
                'email'=>'customer@customer.com',
                'password'=>Hash::make('1234'),
                'role'=>'user',
                'status'=>'active'
            ),
        );

        DB::table('users')->insert($data);
    }
}

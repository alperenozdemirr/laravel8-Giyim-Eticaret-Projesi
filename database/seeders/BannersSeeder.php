<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert(
            [
                [
                    'name'=>'Clothing Collections 2030',
                    'image'=>'banner-1.jpg',
                    'url'=>'http://localhost/shopping/public/#',
                    'default_column'=>'col-lg-7'
                ],
                [
                    'name'=>'Accessories',
                    'image'=>'banner-2.jpg',
                    'url'=>'http://localhost/shopping/public/#',
                    'default_column'=>'col-lg-5'
                ],
                [
                    'name'=>'Shoes Spring 2030',
                    'image'=>'banner-3.jpg',
                    'url'=>'http://localhost/shopping/public/#',
                    'default_column'=>'col-lg-7'
                ]
            ]
        );
    }
}

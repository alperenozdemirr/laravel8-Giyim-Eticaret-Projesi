<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
                [
                    'product_name'=>'Hooded thermal anorak',
                    'categori'=>5,
                    'product_info'=>'Coat with quilted lining and an adjustable hood. Featuring long sleeves with adjustable cuff tabs, adjustable asymmetric hem with elastic side tabs and a front zip fastening with placket.',
                    'product_price'=>270.00,
                    'img1'=>'product-1.jpg',
                    'img2'=>'product-2.jpg',
                    'img3'=>'product-3.jpg',
                    'img4'=>'product-4.jpg'
                ],
                [
                    'product_name'=>'Hooded thermal anorak2',
                    'categori'=>5,
                    'product_info'=>'Coat with quilted lining and an adjustable hood. Featuring long sleeves with adjustable cuff tabs, adjustable asymmetric hem with elastic side tabs and a front zip fastening with placket.',
                    'product_price'=>290.00,
                    'img1'=>'product-2.jpg',
                    'img2'=>'product-2.jpg',
                    'img3'=>'product-3.jpg',
                    'img4'=>'product-4.jpg'
                ]
            ]
        );
    }
}

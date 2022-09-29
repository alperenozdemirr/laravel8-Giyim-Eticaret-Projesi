<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                [
                    'categori_name'=> 'Ayakkabı',
                    'categori_order'=>1
                ],
                [
                    'categori_name'=> 'Gömlek',
                    'categori_order'=>2
                ],
                [
                    'categori_name'=> 'T-shirt',
                    'categori_order'=>3
                ],
                [
                    'categori_name'=> 'Çanta',
                    'categori_order'=>4
                ],
                [
                    'categori_name'=> 'Switshirt',
                    'categori_order'=>5
                ],
                [
                    'categori_name'=> 'Gözlük',
                    'categori_order'=>6
                ]
            ]
        );
    }
}

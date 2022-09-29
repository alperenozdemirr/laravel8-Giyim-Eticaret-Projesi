<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SlidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert(
            [
                [
                    'title'=>'YAZ KOLEKSİYONU',
                    'name'=>'Sonbahar - Kış Koleksiyonları 2030',
                    'info'=>'Lüks temel ögeler yaratan uzman bir etiket. Olağanüstü kaliteye sarsılmaz bir bağlılıkta etik üretilmiştir.',
                    'url'=>'http://localhost/shopping/public/#',
                    'image'=>'hero-1.jpg'
                ],
                [
                    'title'=>'YAZ KOLEKSİYONU',
                    'name'=>'Sonbahar - Kış Koleksiyonları 2030',
                    'info'=>'Lüks temel ögeler yaratan uzman bir etiket. Olağanüstü kaliteye sarsılmaz bir bağlılıkta etik üretilmiştir.',
                    'url'=>'http://localhost/shopping/public/#',
                    'image'=>'hero-2.jpg'
                ]
            ]
        );
    }
}

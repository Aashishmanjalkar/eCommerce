<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
         [   'name'=>'samsung smart tv',
            'price'=>'34000',
            'category'=>'smarttv',
            'gallery'=>'https://www.myce.com/wp-content/images_posts/2015/02/myce-samsung-smart-tv.jpg',
          'description'=>'High Defination',
        ],[
            'name'=>'LG smart TV',
            'price'=>'37000',
            'category'=>'smartphone',
            'gallery'=>'https://tse4.mm.bing.net/th?id=OIP.3Xcd-a_iSOYyUal-4ZBXUAHaFO&pid=Api&P=0&w=244&h=172',  
          'description'=>'High Defination',
        ]
        ]);
    }
}

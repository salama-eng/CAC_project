<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slider_images')->insert([
            [
                'image'=>'slider1.jpg',
                'is_active'=>1
            ]
          ,
          [
            'image'=>'slider2.jpg',
            'is_active'=>1
        ]
      , [
        'image'=>'slider3.jpg',
        'is_active'=>1
    ]
  
        ]
           
        );
    }
}

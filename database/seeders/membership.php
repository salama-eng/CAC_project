<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class membership extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('memberships')->insert([[
            'name'=>'بورش',
            'image'=>'brand1.png',
            'email'=>' gmail.com',
            'phone'=>'777777777',
            'address'=>'sanaa',
            'description'=>' لايوجد',
       
            'is_active'=>1
        ],
        [
            'name'=>'بورش',
            'image'=>'brand4.png',
            'email'=>' gmail.com',
            'phone'=>'777777777',
            'address'=>'sanaa',
            'description'=>' لايوجد',
       
            'is_active'=>1
        ]
          ,[
            'name'=>'بورش',
            'image'=>'brand2.png',
            'email'=>' gmail.com',
            'phone'=>'777777777',
            'address'=>'sanaa',
            'description'=>' لايوجد',
       
            'is_active'=>1
          ],
          [
            'name'=>'بورش',
            'image'=>'brand3.png',
            'email'=>' gmail.com',
            'phone'=>'777777777',
            'address'=>'sanaa',
            'description'=>' لايوجد',
       
            'is_active'=>1
          ]
        ]
           
        );
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->
        // \App\Models\User::factory(10)->create();
       DB::table('roles')->insert([
             'name' => 'super_admin',
            'display_name' => 'ادارة النظام', // optional
            'description' => 'User is the owner of a given project', // optional
        ]);
         DB::table('roles')->insert([
              'name' => 'admin',
            'display_name' => 'ادارة المحتوى', // optional
            'description' => 'User is the owner of a given project', // optional
        ]);
         DB::table('roles')->insert([
              'name' => 'client',
            'display_name' => 'العملاء',// optional
            'description' => 'User is the owner of a given project', // optional
        ]);
    }
}

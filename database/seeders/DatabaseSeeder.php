<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    use DB;
    public function run()
    {
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

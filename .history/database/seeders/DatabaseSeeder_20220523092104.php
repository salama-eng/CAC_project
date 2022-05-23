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

        $this->call(aboutUsSeeder::class);
        $this->call(categorySeeder::class);
        $this->call(sliderSeeder::class);
        $this->call(membership::class);
        $this->call(siteHomeSeeder::class);
        // \App\Models\User::factory(10)->create();
      
    }
}

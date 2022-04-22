<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
class settingsController extends Controller
{
    //
       function generateRoles(){

        Role::create([
            'name' => 'super_admin',
            'display_name' => 'ادارة النظام', // optional
            //'description' => 'User is the owner of a given project', // optional
        ]);

        Role::create([
            'name' => 'admin',
            'display_name' => 'ادارة المحتوى', // optional
            //'description' => 'User is the owner of a given project', // optional
        ]);

        Role::create([
            'name' => 'client',
            'display_name' => 'العملاء', // optional
            //'description' => 'User is the owner of a given project', // optional
        ]);

    }
}

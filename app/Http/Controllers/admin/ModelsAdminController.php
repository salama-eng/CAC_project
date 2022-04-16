<?php

namespace App\Http\Controllers\admin;
use App\Models\Models;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModelsAdminController extends Controller
{
    //
    function showAdminModels(){
        $models = Models::select()->get();
        return view('admin.adminModels', ['models' => $models]);
    }
}

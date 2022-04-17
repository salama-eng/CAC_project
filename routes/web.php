<?php
use App\Http\Controllers\admin\ModelsAdminController;

use App\Http\Controllers\admin\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/do_login',[AuthController::class,'login'])->name('do_login');
Route::get('/save_user',[AuthController::class,'register'])->name('save_user');
Route::get('/adminModels', [ModelsAdminController::class, 'showAdminModels']);
Route::post('/add_admin_model', [ModelsAdminController::class, 'addAdminModel']);
Route::post('/edit_admin_model', [ModelsAdminController::class, 'editAdminModel']);
Route::post('/active_admin_model', [ModelsAdminController::class, 'activeModel']);
Route::group(['middleware'=>'auth'],function(){
	Route::group(['middleware'=>'role:admin'],function(){
        // 
        Route::get('/dash', function () {
            return view('dash')->name('dash');
        });
       
    });



    
});


Route::get('/', function () {
    return view('front.home');
});
Route::get('/admin_dash', function () {
return view('admin.layout.dashboard');
});  

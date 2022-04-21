<?php
use App\Http\Controllers\admin\ModelsAdminController;

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoriesAdminController;
use App\Http\Controllers\admin\PaymentsAdminController;
use App\Http\Controllers\user\UserProfileController;
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



// Admin  Manage

Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/do_login',[AuthController::class,'login'])->name('do_login');
Route::get('/save_user',[AuthController::class,'register'])->name('save_user');




Route::get('/adminModels', [ModelsAdminController::class, 'showAdminModels'])->name('adminModels');
Route::post('/add_admin_model', [ModelsAdminController::class, 'addAdminModel']);
Route::post('/edit_admin_model', [ModelsAdminController::class, 'editAdminModel']);
Route::post('/active_admin_model', [ModelsAdminController::class, 'activeModel']);

// Admin Payments Manage
Route::get('/adminPayments', [PaymentsAdminController::class, 'showAdminPayments'])->name('adminPayments');
Route::post('/add_admin_Payment', [PaymentsAdminController::class, 'addAdminPayment']);
Route::post('/edit_admin_Payment', [PaymentsAdminController::class, 'editAdminPayment']);
Route::post('/active_admin_Payment', [PaymentsAdminController::class, 'activePayment']);
Route::post('/delete_admin_Payment', [PaymentsAdminController::class, 'deletePayment']);

// Admin categries Manage
Route::get('/admincategories', [CategoriesAdminController::class, 'showAdminCategories'])->name('admincategories');
Route::post('/add_admin_category', [CategoriesAdminController::class, 'addAdminCategory']);
Route::post('/edit_admin_category/{id}', [CategoriesAdminController::class, 'editAdminCategory'])->name('edit_admin_category');
Route::post('/active_admin_category/{id}', [CategoriesAdminController::class, 'activeCategory'])->name('active_admin_category');
Route::post('/delete_admin_category', [CategoriesAdminController::class, 'deleteCategory']);


// client profile Manage

Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
Route::get('/editprofile', [CategoriesAdminController::class, 'showedit'])->name('editprofile');


Route::group(['middleware'=>'auth'],function(){
	Route::group(['middleware'=>'role:admin'],function(){

        });
       
    });



Route::get('/', function () {
    return view('front.home');
});
Route::get('/admin_dash', function () {
return view('admin.layout.dashboard');
});  
Route::get('/home', function () {
    return view('front.home');
}); 
Route::get('/client',function(){
    return view('front.layout.clientdashboard');

}); 
    
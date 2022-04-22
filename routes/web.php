<?php

use App\Http\Controllers\admin\ModelsAdminController;

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoriesAdminController;
use App\Http\Controllers\admin\PaymentsAdminController;
use App\Http\Controllers\admin\settingsController;
use App\Mail\VerificationEmail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\user\UserPostsController;
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

// generate role
Route::get('/generate_roles',[settingsController::class,'generateRoles'])->name('generate_roles');

Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/do_login',[AuthController::class,'login'])->name('do_login');
Route::post('/save_user',[AuthController::class,'register'])->name('save_user');
Route::get('/register',[AuthController::class,'showregister'])->name('register');





Route::group(['middleware' => 'auth'], function () {

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

Route::group(['middleware'=>'auth'],function(){
	Route::group(['middleware'=>'role:admin'],function(){
        // 
        Route::get('/dash', function () {
            return view('dash')->name('dash');
        });
       
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
    Route::get('/editprofile', [UserProfileController::class, 'showedit'])->name('editprofile');
    Route::get('/complate_regester', [UserProfileController::class, 'complate_regester'])->name('complate_regester');

    Route::get('/client', function () {
        return view('front.layout.clientdashboard');
    });

    Route::get('/', function () {
        return view('client.home')->name('/');
    });
    Route::get('/admin_dash', function () {
        return view('admin.layout.dashboard');
    });
    Route::get('/home', function () {
        return view('front.home');
    });
    Route::get('/auctiondetails', function () {
        return view('front.auctionDetails');
    });

    Route::get('/addauction', function () {
        return view('front.addAuction');
    });

    //     client postes mangment  ----------------------------------------------------------------
    Route::get('/addAuction', [UserPostsController::class, 'addPost']);
    Route::get('/postedcars', [UserPostsController::class, 'showpstedcars'])->name('postedcars');
    Route::get('/UserUncomplatePosts', [UserPostsController::class, 'uncomplate'])->name('UserUncomplatePosts');
    Route::get('/UserComplatePosts', [UserPostsController::class, 'complate'])->name('UserComplatePosts');
   

    Route::group(['middleware' => 'role:admin'], function () {
    });


    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

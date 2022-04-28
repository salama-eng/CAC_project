<?php

use App\Http\Controllers\admin\AuctionsAdminController;
use App\Http\Controllers\admin\ModelsAdminController;

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CategoriesAdminController;
use App\Http\Controllers\admin\PaymentsAdminController;
use App\Http\Controllers\admin\PostsAdminController;
use App\Http\Controllers\admin\settingsController;
use App\Http\Controllers\admin\UserAdminController;
use App\Http\Controllers\front\ContactUsController;
use App\Http\Controllers\front\HomeController;
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
*/    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');

// generate role
Route::get('/generate_roles',[settingsController::class,'generateRoles'])->name('generate_roles');
Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/do_login',[AuthController::class,'login'])->name('do_login');
Route::post('/save_user',[AuthController::class,'register'])->name('save_user');
Route::get('/register',[AuthController::class,'showregister'])->name('register');

// Send Email
Route::get('/verify_email/{token}/{password}',[AuthController::class,'activeUser'])->name('verify_email');
Route::post('/resendEmail',[AuthController::class,'resendEmail'])->name('resendEmail');

Route::get('/auctiondetails/{id}',[HomeController::class,'showauctionDetails'])->name('auctiondetails');
Route::get('/contact_us',[ContactUsController::class,'showContactUs'])->name('contact_us');


// Reset Password
Route::get('/showResetPassword',[AuthController::class,'showResetPassword'])->name('showResetPassword');
Route::post('/resetPassword',[AuthController::class,'resetPassword'])->name('resetPassword');
Route::get('/verify_password/{token}',[AuthController::class,'formPassword'])->name('verify_password');
Route::post('/new_password',[AuthController::class,'newPassword'])->name('new_password');


Route::group(['middleware' => 'auth'], function () {

    // client profile Manage
    Route::post('/save_profile', [UserProfileController::class, 'save_profile'])->name('save_profile');


    // client profile Manage

    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
    Route::get('/editprofile', [UserProfileController::class, 'showedit'])->name('editprofile');
    Route::post('/save_editprofile', [UserProfileController::class, 'save_edit_profile'])->name('save_editprofile');
    Route::post('/edit_image_profile', [UserProfileController::class, 'editImageProfile'])->name('edit_image_profile');
    Route::get('/complate_regester', [UserProfileController::class, 'complate_regester'])->name('complate_regester');

    Route::get('/client', function () {
        return view('front.layout.clientdashboard');
    });

    Route::get('/', function () {
        return view('front.index');
    });

    Route::get('/admin_dash', function () {
        return view('admin.layout.dashboard');
    });
    Route::get('/home', function () {
        return view('front.home');
    });



    //     client postes mangment  ----------------------------------------------------------------
    Route::get('/addAuction', [UserPostsController::class, 'addPost'])->name('addAuction');
    Route::post('/save_post', [UserPostsController::class, 'save_post'])->name('save_post');
    Route::get('/postedcars', [UserPostsController::class, 'showpstedcars'])->name('postedcars');
    Route::get('/UserUncomplatePosts', [UserPostsController::class, 'uncomplate'])->name('UserUncomplatePosts');
    Route::get('/UserComplatePosts', [UserPostsController::class, 'complate'])->name('UserComplatePosts');
   

    Route::group(['middleware' => 'role:admin'], function () {
        Route::get('/adminModels', [ModelsAdminController::class, 'showAdminModels'])->name('adminModels');
        Route::post('/add_admin_model', [ModelsAdminController::class, 'addAdminModel']);
        Route::post('/edit_admin_model', [ModelsAdminController::class, 'editAdminModel']);
        Route::post('/active_admin_model', [ModelsAdminController::class, 'activeModel']);
    
        // Admin Manage User
        Route::get('/showAllUsers', [UserAdminController::class,'showAllUsers'])->name('showAllUsers');
        Route::post('/active_admin_user', [UserAdminController::class, 'activeUser'])->name('active_admin_user');
    
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
        
        // Admin Manage Posts
        Route::get('/admin_posts', [PostsAdminController::class, 'showAdminPosts'])->name('admin_posts');
        
        // Admin Manage Started Auction
        Route::get('/Start_auction', [PostsAdminController::class, 'showAdminPosts'])->name('Start_auction');
        
        // Admin Manage Auction
        Route::get('/admin_acution', [AuctionsAdminController::class, 'showAdminAuction'])->name('admin_acution');
        
        // Admin Manage Ended Auction
        Route::get('/endede_acution', [AuctionsAdminController::class, 'showAdminEndedAuction'])->name('endede_acution');
        
    
    });


    Route::get('/adminModels', [ModelsAdminController::class, 'showAdminModels'])->name('adminModels');
    Route::post('/add_admin_model', [ModelsAdminController::class, 'addAdminModel']);
    Route::post('/edit_admin_model', [ModelsAdminController::class, 'editAdminModel']);
    Route::post('/active_admin_model', [ModelsAdminController::class, 'activeModel']);

    // Admin Manage User
    Route::get('/showAllUsers', [UserAdminController::class,'showAllUsers'])->name('showAllUsers');
    Route::post('/active_admin_user', [UserAdminController::class, 'activeUser'])->name('active_admin_user');

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
    
    // Admin Manage Posts
    Route::get('/admin_posts', [PostsAdminController::class, 'showAdminPosts'])->name('admin_posts');
    
    // Admin Manage Started Auction
    Route::get('/Start_auction', [PostsAdminController::class, 'showAdminPosts'])->name('Start_auction');
    
    // Admin Manage Auction
    Route::get('/admin_acution', [AuctionsAdminController::class, 'showAdminAuction'])->name('admin_acution');
    
    // Admin Manage Ended Auction
    Route::get('/endede_acution', [AuctionsAdminController::class, 'showAdminEndedAuction'])->name('endede_acution');
    


    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::get('/', function () {
    return view('front.index');
});

Route::get('/auctions', function () {
    return view('front.auctions');
});
    Route::get('/auctions', function () {
        return view('front.auctions');
});


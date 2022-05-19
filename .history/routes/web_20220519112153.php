<?php

use App\Http\Controllers\admin\AboutUsController;
use App\Http\Controllers\admin\AuctionsAdminController;
use App\Http\Controllers\admin\ModelsAdminController;
use App\Http\Controllers\admin\WalletAdminController;

use App\Http\Controllers\testController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\admin\CategoriesAdminController;
use App\Http\Controllers\admin\PaymentsAdminController;
use App\Http\Controllers\admin\PostsAdminController;
use App\Http\Controllers\admin\settingsController;
use App\Http\Controllers\admin\UserAdminController;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\ContactUsController as AdminContactUsController;
use App\Http\Controllers\admin\contactUsInfoController;
use App\Http\Controllers\admin\membershipController;
use App\Http\Controllers\admin\sliderController;
use App\Http\Controllers\front\ContactUsController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\siteHomeController;
use App\Mail\VerificationEmail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\user\UserPostsController;
use App\Http\Controllers\user\WalletController;
use App\Http\Controllers\user\UserAuctionController;
use App\Http\Controllers\user\UserProfileController;
use App\Http\Controllers\user\UserHomeController;
use App\Http\Controllers\user\ChatController;
use App\Http\Controllers\user\TestUserController;


use Illuminate\Contracts\View\View;
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

Route::get('/ddemail', [HomeController::class, 'email'])->name('ddemail');

Route::get('/errorsRedirect', [HomeController::class, 'errorsRedirect'])->name('errorsRedirect');
Route::get('/errorsProfile', [HomeController::class, 'errorsRedirect'])->name('errorsProfile');
Route::get('/adminRole', [HomeController::class, 'adminRole']);
Route::get('/clientRole', [HomeController::class, 'clientRole']);
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

    Route::group(['middleware' => ['role:admin']], function () {
        
        Route::get('/admin_dash', function () {
            return view('admin.layout.dashboard');
        });
        Route::get('/AdminDash', [AdminHomeController::class,'show'])->name('AdminDash');
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
        Route::post('/active', [PostsAdminController::class, 'editActive'])->name('activeAuction');
        Route::post('/unactive', [PostsAdminController::class, 'uneditActive'])->name('unactive');
        Route::post('/unactive_auction', [AuctionsAdminController::class, 'uneditActive_auction'])->name('unactive_auction');
        // Admin Manage Started Auction
        // Admin Manage Auction
        Route::get('/admin_acution', [AuctionsAdminController::class, 'showAdminAuction'])->name('admin_acution');
        Route::post('/accept', [AuctionsAdminController::class, 'editActive'])->name('accept');
        Route::get('/un_complate', [AuctionsAdminController::class, 'showAdminAuction'])->name('un_complate');
        Route::post('/sendnotification', [AuctionsAdminController::class, 'sendnotification'])->name('sendnotification');
        
        // Admin Manage Ended Auction
        Route::get('/endede_acution', [AuctionsAdminController::class, 'showAdminAuction'])->name('endede_acution');
        Route::post('/admin_orders', [AuctionsAdminController::class, 'admin_orders'])->name('admin_orders');
         
        // Admin Manage slider Images
        Route::get('/slider_image', [sliderController::class, 'showSliderPage'])->name('slider_image');
        Route::post('/add_slider_image', [sliderController::class, 'addSliderImage']);
        Route::post('/edit_slider_image/{id}', [sliderController::class, 'editSliderImage'])->name('edit_slider_image');
        Route::post('/active_slider_image/{id}', [sliderController::class, 'activeSliderImage'])->name('active_slider_image');
        
        // Admin Manage membership 
        Route::get('/membership', [membershipController::class, 'showMembership'])->name('membership');
        Route::post('/add_membership', [membershipController::class, 'addMembership']);
        Route::post('/edit_membership/{id}', [membershipController::class, 'editMembership'])->name('edit_membership');
        Route::post('/active_membership/{id}', [membershipController::class, 'activeMembership'])->name('active_membership');
        

        // Admin Manage Home Page
        Route::get('/manage_home', [AdminHomeController::class, 'manageHome'])->name('manage_home');
        Route::post('/add_content', [AdminHomeController::class, 'addContent'])->name('add_content');
        Route::post('/edit_home_content/{id}', [AdminHomeController::class, 'editContent'])->name('edit_home_content');
        
        // Admin Manage membership 
        Route::get('/manage_contact_us', [contactUsInfoController::class, 'showAdminCategories'])->name('manage_contact_us');
        Route::post('/add_contact_us', [contactUsInfoController::class, 'addContactUs']);
        Route::post('/edit_contact_us/{id}', [contactUsInfoController::class, 'editContactUs'])->name('edit_contact_us');
        Route::post('/active_contact_us/{id}', [contactUsInfoController::class, 'activeContactUs'])->name('active_contact_us');

        // Admin Manage About Us Page
        Route::get('/manage_about_us', [AboutUsController::class, 'manageAboutUs'])->name('manage_about_us');
        Route::post('/add_about_us_content', [AboutUsController::class, 'addAboutUsContent'])->name('add_about_us_content');
        Route::post('/edit_content/{id}', [AboutUsController::class, 'editContent'])->name('edit_content');
        
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
            Route::post('/active', [PostsAdminController::class, 'editActive'])->name('activeAuction');
            Route::post('/unactive', [PostsAdminController::class, 'uneditActive'])->name('unactive');
            // Admin Manage Started Auction
            
            
            // Admin Manage Auction
            Route::get('/admin_acution', [AuctionsAdminController::class, 'showAdminAuction'])->name('admin_acution');
            Route::post('/accept', [AuctionsAdminController::class, 'editActive'])->name('accept');
            Route::get('/un_complate', [AuctionsAdminController::class, 'showAdminAuction'])->name('un_complate');
            Route::post('/sendnotification', [AuctionsAdminController::class, 'sendnotification'])->name('sendnotification');
            
            // Admin Manage Ended Auction
            Route::get('/endede_acution', [AuctionsAdminController::class, 'showAdminAuction'])->name('endede_acution');
            
            // Admin Manage slider Images
            Route::get('/slider_image', [sliderController::class, 'showSliderPage'])->name('slider_image');
            Route::post('/add_slider_image', [sliderController::class, 'addSliderImage']);
            Route::post('/edit_slider_image/{id}', [sliderController::class, 'editSliderImage'])->name('edit_slider_image');
            Route::post('/active_slider_image/{id}', [sliderController::class, 'activeSliderImage'])->name('active_slider_image');
            
            // Admin Manage membership 
            Route::get('/membership', [membershipController::class, 'showMembership'])->name('membership');
            Route::post('/add_membership', [membershipController::class, 'addMembership']);
            Route::post('/edit_membership/{id}', [membershipController::class, 'editMembership'])->name('edit_membership');
            Route::post('/active_membership/{id}', [membershipController::class, 'activeMembership'])->name('active_membership');
            
    
            // Admin Manage Home Page
            Route::get('/manage_home', [AdminHomeController::class, 'manageHome'])->name('manage_home');
            Route::post('/add_content', [AdminHomeController::class, 'addContent'])->name('add_content');
            Route::post('/edit_home_content/{id}', [AdminHomeController::class, 'editContent'])->name('edit_home_content');
            
            // Admin Manage membership 
            Route::get('/manage_contact_us', [contactUsInfoController::class, 'showAdminCategories'])->name('manage_contact_us');
            Route::post('/add_contact_us', [contactUsInfoController::class, 'addContactUs']);
            Route::post('/edit_contact_us/{id}', [contactUsInfoController::class, 'editContactUs'])->name('edit_contact_us');
            Route::post('/active_contact_us/{id}', [contactUsInfoController::class, 'activeContactUs'])->name('active_contact_us');
    
            // Admin Manage About Us Page
            Route::get('/manage_about_us', [AboutUsController::class, 'manageAboutUs'])->name('manage_about_us');
            Route::post('/add_about_us_content', [AboutUsController::class, 'addAboutUsContent'])->name('add_about_us_content');
            Route::post('/edit_content/{id}', [AboutUsController::class, 'editContent'])->name('edit_content');
        
        Route::get('/admin_wallet', [WalletAdminController::class,'adminWallet'])->name('admin_wallet');
    
        Route::get('/Start_auction', [PostsAdminController::class, 'showAdminPosts'])->name('Start_auction');
    });
    Route::post('/message', [AdminContactUsController::class,'saveMessage'])->name('message'); 
    Route::any('test', [testController::class, 'index'])->name('test');
    Route::any('testPayment', [TestUserController::class, 'index'])->name('testPayment');
    Route::get('test/response/{info}', [testController::class, 'showTest'])->name('test/response');
    Route::get('test/cancel/{cancel}', [testController::class, 'testCancel'])->name('testCancel');
    Route::get('test/cancel', [testController::class, 'viewCancel'])->name('viewCancel');
    Route::get('testPayment/response/{info}', [TestUserController::class, 'showTest'])->name('testPayment/response');
    Route::get('testPayment/cancel/{cancel}', [TestUserController::class, 'testCancel'])->name('testPayment/cancel');
    Route::get('test/cancel', [TestUserController::class, 'viewCancel'])->name('testCancelPayment');
    Route::get('/Start_auction', [PostsAdminController::class, 'showAdminPosts'])->name('Start_auction');
    // client profile Manage
    Route::post('/save_profile', [UserProfileController::class, 'save_profile'])->name('save_profile');
    // client profile Manage
    Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
    Route::get('/build', [LessonController::class, 'build'])->name('build');
    Route::get('/editprofile', [UserProfileController::class, 'showedit'])->name('editprofile');
    Route::post('/save_editprofile', [UserProfileController::class, 'save_edit_profile'])->name('save_editprofile');
    Route::post('/edit_image_profile', [UserProfileController::class, 'editImageProfile'])->name('edit_image_profile');
    Route::get('/complate_regester', [UserProfileController::class, 'complate_regester'])->name('complate_regester');

    Route::get('/client', function () {
        return view('front.layout.clientdashboard');
    });

    //     client postes mangment  ----------------------------------------------------------------
    Route::get('/addAuction', [UserPostsController::class, 'addPost'])->name('addAuction');
    Route::post('/save_post', [UserPostsController::class, 'save_post'])->name('save_post');
    Route::get('/postedcars', [UserPostsController::class, 'showpstedcars'])->name('postedcars');
    Route::get('/UserUncomplatePosts', [UserPostsController::class, 'uncomplate'])->name('UserUncomplatePosts');
    Route::get('/UserComplatePosts', [UserPostsController::class, 'complate'])->name('UserComplatePosts');
      //     client Auctions mangment  ----------------------------------------------------------------
    Route::post('/user_confirm', [UserAuctionController::class, 'user_confirm'])->name('user_confirm');
    Route::get('/AuctionCars', [UserAuctionController::class, 'showauctions'])->name('AuctionCars');
    Route::get('/UserUncomplateAuctions', [UserAuctionController::class, 'uncomplate'])->name('UserUncomplateAuctions');
    Route::get('/UserComplateAuctions', [UserAuctionController::class, 'complate'])->name('UserComplateAuctions');
    Route::get('/UserDash', [UserHomeController::class,'show'])->name('UserDash');
    Route::resource('chat', ChatController::class);
    Route::get('/wallet/{id}', [WalletController::class,'showwallet'])->name('wallet');
});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/home', [HomeController::class, 'showHomePage'])->name('home');
Route::get('/', [HomeController::class, 'showHomePage'])->name('home');
Route::get('/auctions', function () {
    return view('front.auctions');
})->name('auctions');
Route::get('/resend_email', function () {
    return view('mail.resend_email');
});
Route::get('/email', function () {
    return view('mail.email_verify');
});
Route::get('/emaill', function () {
    return view('mail.message_content');
});
Route::get('/auctions',[HomeController::class,'show_auctions'])->name('auctions');

/******** bid auction **************/
Route::post('/bid_auction/{id}',[UserAuctionController::class,'bid_auction'])->name('bid_auction');
Route::get('/offers',[HomeController::class,'show_offers'])->name('offers');

Route::get('/contact_us', [HomeController::class,'showContactUs'])->name('contact_us');
Route::get('/aboutUs', [HomeController::class,'showAboutUs'])->name('aboutUs');
Route::get('/privacyPolicy',[HomeController::class,'showPrivacyPolicy'])->name('privacyPolicy');
Route::get('/privacyPolicy', function(){
    return view('front.privacyPolicy');
})->name('privacyPolicy');
Route::get('/faq', function(){
    return view('front.FAQ');
})->name('faq');


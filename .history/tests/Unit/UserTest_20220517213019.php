<?php

namespace Tests\Unit;

use App\Http\Controllers\admin\membershipController;
use App\Http\Controllers\admin\UserAdminController;
use App\Http\Controllers\user\UserProfileController;
use App\Http\Controllers\user\WalletController;
use App\Models\membership;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserProfile;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Cookie\Factory;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Auth;
use tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
  public function test_login_form(){
      $response = $this->get('login');
      $response->assertStatus(200);
  }
  public function test_user_duplication() {

    $user1=User::make([
       'name' => 'admin',
       'email' => 'admin@gmail.com'
    ]);
    $user2=User::make([
        'name' => 'admin',
        'email' => 'client@gmail.com'
     ]);
     $this->assertTrue($user1->email !=  $user2->email);
  }
  public function test_it_stor_user(){
      $response=$this->post('/save_user',[
      'name' => 'salama',
      'email' => 'salama@gmail.com',
       'password' => 'password',
       'is_active' => '1',
       'remember_token' =>'152hyuui'
      
      ]);
      $response->assertRedirect('/');
  }





  public function test_Database(){
      $this->assertDatabaseHas('users',[
          'name' => 'salama',
      ]);
      $this->assertDatabaseHas('posts',[
        'name' => 'هونداي',
    ]);
  }
  public function test_Missing_Database(){
    $this->assertDatabaseMissing('auctions',[
        'id' =>1000,
    ]);

    $this->assertDatabaseMissing('users',[
        'id' =>1000,
    ]);
}

public function test_if_user_has_profile() {
    $returnvalues=(new UserProfileController)->show();
    $this->assertnotEmpty($returnvalues);
  //  $this->assertTrue(true);
}
public function test_if_user_has_wallet() {
    $returnvalues=(new WalletController)->showwallet(1);
    $this->assertnotEmpty($returnvalues);
  //  $this->assertTrue(true);
}
public function test_show_all_users() {
    $returnvalues=(new UserAdminController)->showAllUsers();
    $this->assertnotEmpty($returnvalues);
  //  $this->assertTrue(true);
}

public function test_active_admin_user() {
    $request=5;
    $returnvalues=(new UserAdminController)->activeUser($request->user());
   
    $this->assertnotEmpty($returnvalues);
  //  $this->assertTrue(true);
}
// public function test_if_seeders_works()
// {
//     $this->seed(); //seed all seeders in the seeders folders
//     //php artisan db:seed
    
// }


}



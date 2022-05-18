<?php

namespace Tests\Unit;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Cookie\Factory;
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
      'name' => 'خليفة القياضي',
      'email' => 'khalifa.alqiadi@gmail.com',
       'password' => 'password',
       'is_active' => '1',
       'remember_token' =>'LFxvakMZNxkd8DsrpDy1jcmoZJ4uYEay2INuzJm6x27Ccbt9HwQrHrA5n0v0'
      
      ]);
      $response->assertRedirect('/');
  }





  public function test_Database(){
      $this->assertDatabaseHas('users',[
          'name' => 'khalifa alqiadi',
      ]);
      $this->assertDatabaseHas('posts',[
        'name' => 'شبح',
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

// public function test_if_seeders_works()
// {
//     $this->seed(); //seed all seeders in the seeders folders
//     //php artisan db:seed
    
// }


}



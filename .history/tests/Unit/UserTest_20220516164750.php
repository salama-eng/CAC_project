<?php

namespace Tests\Unit;

use App\Models\User;
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
  }

}

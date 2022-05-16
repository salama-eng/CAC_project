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
      $response=$this->post('/regester',[
      'name' => 'salama',
      'email' => 'salama@gmail.com',
       'password' => 'password',
       'password_confirmation' => 'password'
      
      ]);
      $response->assertRedirect('/home');
  }
}

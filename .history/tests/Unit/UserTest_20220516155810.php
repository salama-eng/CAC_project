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
      $response = $this->put('login');
      $response->assertStatus(200);
  }
  public function test_user_duplication() {

    $user1=User::make([
       'name' => 'client',
       'email' => 'client@gmail.com'
    ]);
    $user2=User::make([
        'name' => 'admin',
        'email' => 'admin@gmail.com'
     ]);
     $this->assertTrue($user1->name !=  $user2->name);
  }
}

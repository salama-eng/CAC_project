<?php

namespace Tests\Unit;

use tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
  public function test_login_form(){
      $response = $this->post('login');
      $response->assertStatus(200);
  }
}

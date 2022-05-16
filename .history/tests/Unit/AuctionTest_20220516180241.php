<?php

namespace Tests\Unit;
use Laravel\Dusk\DuskServiceProvider;

use tests\TestCase;

class AuctionTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */


   

    
  public function test_Database(){
    $this->assertDatabaseHas('users',[
        'name' => 'salama',
    ]);
    $this->assertDatabaseHas('posts',[
      'name' => 'هونداي',
  ]);
}
}

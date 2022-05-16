<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class AuctionTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
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
}

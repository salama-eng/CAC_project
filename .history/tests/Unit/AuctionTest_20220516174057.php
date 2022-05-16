<?php

namespace Tests\Unit;

use tests\TestCase;

class AuctionTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_it_stor_auction(){
        $response=$this->post('/save_post',[
        'name' => 'مرسيدس',
        'email' => 'salama@gmail.com',
         'password' => 'password',
         'is_active' => '1',
         'remember_token' =>'152hyuui'
        
        ]);
        $response->assertRedirect('/');
    }
}

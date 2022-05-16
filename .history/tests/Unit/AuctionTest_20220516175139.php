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
        'category_id' => '1',
         'user_id' => '1',
         'model' => '2020',
         'description' =>'لايوجد',
         'engin_car' =>'لايوجد',
         'starting_price' =>'500',
         'auction_ceiling' =>'50',
         'color' =>'blue',
         'image' =>'car.jpg',
         'multiple_image' =>['car.jpg','car.png'],
         'address' =>'صنعاء',
         'damage' =>'1',
         'status_car' =>'2',
         'status_auction' =>'0',
         'is_active' =>'1',
         'start_date' =>now(),
         'end_date' =>


        
        ]);
        $response->assertRedirect('/');
    }
}

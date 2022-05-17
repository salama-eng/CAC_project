<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Cookie\Factory;
use Illuminate\Support\Facades\Auth;

class AuctionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
   
public function test_it_stor_auction(){
   
    Auth::check();
    $user=User::factory()->create();
    $this->ActingAs($user);
    $response = $this->post('/save_post', [
    'name' => 'مرسيدس',
    'category_id' => '1',
     'user_id' => '1',
     'model' => '2020',
     'description' =>'لايوجد',
     'engin_car' =>'لايوجد',
     'starting_price' =>'500',
     'auction_ceiling' =>'100',
     'color' =>'blue',
     'image' =>'car.jpg',
     'multiple_image' =>['car.jpg','car.png'],
     'address' =>'صنعاء',
     'damage' =>'1',
     'status_car' =>'2',
     'status_auction' =>'0',
     'is_active' =>'1',
     'start_date' =>now(),
     'end_date' =>2022-05-30

    ]);
   
    $response->assertRedirect('/');
}
public function test_it_bid_on_auction(){
   
    Auth::check();
    $user=User::factory()->create();
    $this->ActingAs($user);
    $response = $this->post('/test', [
    'date' => now(),
    'bid_amount' => '100',
     'bid_total' => '1000',
     'aw_user_id' =>'1',
     'post_id' =>'1',
    

    ]);
   
    $response->assertRedirect('/');
}

 
public function test_it_stor_auction_if_not_login(){
   
    $response = $this->post('/save_post', [
    'name' => 'مرسيدس',
    'category_id' => '1',
     'user_id' => '1',
     'model' => '2020',
     'description' =>'لايوجد',
     'engin_car' =>'لايوجد',
     'starting_price' =>'500',
     'auction_ceiling' =>'100',
     'color' =>'blue',
     'image' =>'car.jpg',
     'multiple_image' =>['car.jpg','car.png'],
     'address' =>'صنعاء',
     'damage' =>'1',
     'status_car' =>'2',
     'status_auction' =>'0',
     'is_active' =>'1',
     'start_date' =>now(),
     'end_date' =>2022-05-30

    ]);
   
    
    // $response = $this->actingAs(User::find(1))
    // ->withSession(['banned' => false])
    // ->get('postedcars');
    
    $response->assertRedirect('login');
}


}

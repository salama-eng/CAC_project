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
      $this->assertDatabaseHas('posts',[
        'name' => 'هونداي',
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


public function test_it_stor_auction(){
  
    Auth::check();
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
    
    $response->assertRedirect('/');
}
}



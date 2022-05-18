<?php

namespace Tests\Feature;

use App\Http\Controllers\admin\CategoriesAdminController;
use Laravel\Dusk\Chrome;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Contracts\Cookie\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Testing\Fluent\AssertableJson;

class DashTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
   public function test_login_redirection()
   {
       $user=User::factory()->create([
       'password' => Hash::make('12345678')
       ]);
       /** login with created user */
       $response=$this->post('do_login',[
        'email' =>$user->email,
        'password' =>'12345678'
       ]);
       $response->assertRedirect('/');
       $this->get(route('UserDash'));
       $this->get(route('profile'));
       $this->get(route('addAuction'));
    
    }




    public function test_login_dash_if_not_login()
    {
        $response = $this->get('UserDash');
        $response->assertStatus(302);
     }

     public function test_Authirzation_Admin_dash()
     {
         $response = $this->get('AdminDash');
         $response->assertStatus(302);
      }

      public function test_Authirzation_Admin_dash_if_login()
      {
              Auth::check();
              $user=User::factory()->create()->attachRole('admin');
              $this->ActingAs($user);
              $response = $this->get('AdminDash');
              $response->assertStatus(200);
       }
       public function test_Authirzation_Admin_manage_categories_if_login()
       {
               Auth::check();
               $user=User::factory()->create()->attachRole('admin');
               $this->ActingAs($user);
               $response = $this->get('admincategories');
               $response->assertStatus(200);
        }

        public function test_active_categories_Authirzation_Admin()
        {

            Auth::check();
            $this->withoutExceptionHandling();
                $admin = User::find(1);
                $this->actingAs($admin);
                $response=(new CategoriesAdminController)->activeCategory(5);
                $this->assertnotEmpty($response);
             
         }

         public function test_edit_categories_Authirzation_Admin()
         {
 
             Auth::check();
             $this->withoutExceptionHandling();
                 $admin = User::find(1);
                 $response = $this
                 ->actingAs($admin)
                 ->json('POST', 
                 '/active_admin_category/1', 
                 ['is_active' => '0']);
                 $this->assertnotEmpty($response);
              
          }

          public function test_accept_post_Authirzation_Admin()
          {
              Auth::check();
              $this->withoutExceptionHandling();
                  $admin = User::find(1);
                  $response = $this
                  ->actingAs($admin)
                  ->json('POST', 
                  '/active', 
                  ['id' => '2']);
                  $this->assertnotEmpty($response);
           }

           public function test_deActive_post_Authirzation_Admin()
           {
               Auth::check();
               $this->withoutExceptionHandling();
                   $admin = User::find(1);
                   $response = $this
                   ->actingAs($admin)
                   ->json('POST', 
                   '/unactive', 
                   ['id' => '2']);
                   $this->assertnotEmpty($response);
            }

        
        public function test_show_auctions_uthirzation_Admin()
        {
            Auth::check();
            $this->withoutExceptionHandling();
                $admin = User::find(1);
                $response = $this
                ->actingAs($admin);
                $response = $this->get('admin_acution');
                $this->assertnotEmpty($response);
         }
        Route::post('/accept', [AuctionsAdminController::class, 'editActive'])->name('accept');

        public function test_deActive_post_Authirzation_Admin()
        {
            Auth::check();
            $this->withoutExceptionHandling();
                $admin = User::find(1);
                $response = $this
                ->actingAs($admin)
                ->json('POST', 
                '/unactive', 
                ['id' => '2']);
                $this->assertnotEmpty($response);
         } 
}

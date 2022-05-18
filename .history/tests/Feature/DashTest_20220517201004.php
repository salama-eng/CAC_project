<?php

namespace Tests\Feature;
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

}

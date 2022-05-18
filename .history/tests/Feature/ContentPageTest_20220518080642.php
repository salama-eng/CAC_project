<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ContentPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
   
    public function test_show_slidel_Authirzation_Admin()
    {
        Auth::check();
        $this->withoutExceptionHandling();
            $admin = User::find(1);
            $response = $this
            ->actingAs($admin);
            $response = $this->get('slider_image');
            $this->assertnotEmpty($response);
     }
}

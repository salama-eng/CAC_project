<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class RoutTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
    public function testApplication()
    {
        $response = $this->call('GET', '/');
     
        $this->assertEquals(200, $response->status());
    }
    public function testanymethod()
    { $user=User::factory()->create();
        $this->ActingAs($user);
        $response = $this->call('any', 'test');
     
        $this->assertEquals(200, $response->status());
    }
}

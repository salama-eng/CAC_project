<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContentPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    Route::get('/slider_image', [sliderController::class, 'showSliderPage'])->name('slider_image');
    public function test_show_slidel_Authirzation_Admin()
    {
        Auth::check();
        $this->withoutExceptionHandling();
            $admin = User::find(1);
            $response = $this
            ->actingAs($admin);
            $response = $this->get('slider_image');
            dd($response);
            $this->assertnotEmpty($response);
     }
}

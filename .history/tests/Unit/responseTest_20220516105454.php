<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class responseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->isjson('POST','chat',['id'=>'2']);
$response->assertStatus(404);
        // $this->assertTrue(true);
    }
}

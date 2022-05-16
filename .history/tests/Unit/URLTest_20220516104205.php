<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class URLTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response=$this->get("/chat");
        $response->assertStatus(404);
    }
}

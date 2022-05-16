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
        $response = $this->json('POST','chat')
        // $this->assertTrue(true);
    }
}

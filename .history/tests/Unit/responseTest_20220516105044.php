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
        $response = $this->Json::('POST','chat',['id'=>'2']);
        // $this->assertTrue(true);
    }
}

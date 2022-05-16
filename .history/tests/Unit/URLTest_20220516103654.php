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
    public function UrlTest()
    {
        $response=$this->post("chat");
        $response->assertStatusCode(200);
    }
}

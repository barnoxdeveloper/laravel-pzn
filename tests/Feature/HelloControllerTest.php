<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testHello()
    {
        $this->get('/controller/hello/Andre')->assertSeeText('Halo Andre');
    }

    public function testRequest()
    {
        $this->get('/controller/hello/request', [
            "Accept" => "plain/text"
        ])->assertSeeText('/controller/hello/request')
        ->assertSeeText('controller/hello/request')
        ->assertSeeText('GET')
        ->assertSeeText('plain/text');
    }
}

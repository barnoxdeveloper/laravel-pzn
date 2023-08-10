<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGet()
    {
        $this->get('andre')
            ->assertStatus(200)
            ->assertSeeText('Hello Andre');
    }

    public function testRedirect()
    {
        $this->get('/youtube')
            ->assertRedirect('/andre');
    }

    public function testFallback()
    {
        $this->get('/tidakada')
            ->assertSeeText('404');
    }
}

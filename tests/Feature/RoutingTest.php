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

    public function testRouteParameter()
    {
        $this->get('/products/1')
            ->assertSeeText('Product 1');

        $this->get('/products/1/items/XXX')
            ->assertSeeText('Product 1, Item XXX');
    }

    public function testRouteParameterRegex()
    {
        $this->get('/categories/100')
            ->assertSeeText('Category 100');

        $this->get('/categories/andre')
            ->assertSeeText('404 By Andre');
    }

    public function testRouteParameterOptional()
    {
        $this->get('/users/andre')
            ->assertSeeText('User andre');

        $this->get('/users')
            ->assertSeeText('User 404');
    }

    public function testRouteParameterConflict()
    {
        $this->get('/conflict/andre')
            ->assertSeeText('Conflict Andre');

        $this->get('/conflict/andre')
            ->assertSeeText('Conflict Andre Elm');
    }

    public function testNamedRoute()
    {
        $this->get('/produk/12345')
            ->assertSeeText('Link http://localhost/products/12345');

        $this->get('/produk-redirect/12345')
            ->assertRedirect('/products/12345');
    }
}

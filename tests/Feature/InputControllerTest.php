<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testInput()
    {
        $this->get('/input/hello?name=Andre')->assertSeeText('Hello Andre');
        $this->post('/input/hello', [
                'name' => 'Andre'
            ])
            ->assertSeeText('Hello Andre');
    }

    public function testInputNested()
    {
        $this->post('/input/first', [
                'name' => [
                    'first' => 'Andre',
                    'last' => 'Elmus',
                ]
            ])
            ->assertSeeText('Hello Andre');
    }

    public function testInputAll()
    {
        $this->post('/input/hello/input', [
                'name' => [
                    'first' => 'Andre',
                    'last' => 'Elmus',
                ]
            ])
            ->assertSeeText('name')
            ->assertSeeText('first')
            ->assertSeeText('Andre')
            ->assertSeeText('Elmus');
    }

    public function testInputArray()
    {
        $this->post('/input/hello/array', [
                'products' => [
                    [
                        'name' => 'Samsung',
                        'price' => '10',
                    ],
                    [
                        'name' => 'Apple',
                        'price' => '15',
                    ]
                ],
            ])
            ->assertSeeText('Samsung')
            ->assertSeeText('Apple');
    }
}

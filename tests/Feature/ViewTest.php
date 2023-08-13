<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testView()
    {
        $this->get('/hello')->assertSeeText('Hello Andre');
        $this->get('/hello-again')->assertSeeText('Hello Andre');
    }

    public function testNested()
    {
        $this->get('/hello-world')->assertSeeText('World Andre');
    }

    public function testViewWithouthRoute()
    {
        $this->view('hello', ['name' => 'Andre'])->assertSeeText('Hello Andre');
        $this->view('hello.world', ['name' => 'Andre'])->assertSeeText('World Andre');
    }
}

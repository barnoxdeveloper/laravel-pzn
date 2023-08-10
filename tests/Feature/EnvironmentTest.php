<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
    public function testGetEnv()
    {
        $test = env('APP_NAME');
        self::assertEquals('Laravel', $test);
    }

    public function testDefaultEnv()
    {
        $test = env('AUTHOR', 'ANDRE');
        self::assertEquals('ANDRE', $test);
    }
}

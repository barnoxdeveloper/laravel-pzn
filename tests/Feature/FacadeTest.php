<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FacadeTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testConfig()
    {
        $firstName1 = config('contoh.author.first');
        $firstName2 = Config::get('contoh.author.first');

        self::assertEquals($firstName1, $firstName2);

        var_dump(Config::all());
    }

    public function testConfigDependency()
    {
        $config = $this->app->make('config');
        $firstName3 = $config->get('contoh.author.first');

        $firstName1 = config('contoh.author.first');
        $firstName2 = Config::get('contoh.author.first');

        self::assertEquals($firstName1, $firstName2);
        self::assertEquals($firstName1, $firstName3);
    }

    public function testingFacadeMock()
    {
        // Config::shouldReceive('get')
        //         ->with('contoh.author.first')
        //         ->andReturn('Andre Keren');
        $firstName = Config::get('contoh.author.first');

        self::assertEquals('Andre Keren', $firstName);

    }
}

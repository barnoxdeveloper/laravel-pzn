<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    public function testConfig(): void
    {
        $firstName = config('contoh.author.first');
        $lastName = config('contoh.author.last');
        $email = config('contoh.email');
        $web = config('contoh.web');

        self::assertEquals('Andre', $firstName);
        self::assertEquals('Elmustanizar', $lastName);
        self::assertEquals('email@email.com', $email);
        self::assertEquals('buatcompanyprofile.com', $web);

    }
}

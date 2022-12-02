<?php

namespace Tests\Unit;

use App\Services\PasswordService;
use Tests\TestCase;

class PasswordTest extends TestCase
{

    /**
     * @param $password
     * @param $ePassword
     *
     * @return void
     *
     * @dataProvider passwordProvider
     */
    public function testEncrypt($password, $ePassword)
    {
        $service = new PasswordService();
        $this->assertSame($service->encrypt($password), $ePassword);
    }

    public function passwordProvider(): array
    {
        return [
            ['alex', '534b44a19bf18d20b71ecc4eb77c572f'],
            ['bob', '9f9d51bc70ef21ca5c14f307980a29d8'],
            ['pete', '858d41c9e397b8fa34bb046d8055f276']
        ];
    }
}
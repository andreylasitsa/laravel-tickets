<?php

namespace App\Services;

use App\Services\IFaces\IPasswordService;

class PasswordService implements IPasswordService
{
    public function encrypt(string $password): string
    {
        return md5($password);
    }
}
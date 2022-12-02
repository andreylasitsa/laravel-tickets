<?php

namespace App\Services\IFaces;

interface IPasswordService
{
    public function encrypt(string $password): string;
}
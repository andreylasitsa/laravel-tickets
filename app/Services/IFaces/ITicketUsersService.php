<?php

namespace App\Services\IFaces;

use App\Models\User;

interface ITicketUsersService
{
    public function getTicketUser(int $id): User;
}
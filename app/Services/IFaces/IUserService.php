<?php

namespace App\Services\IFaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface IUserService
{
    public function getAll(): Collection;
    public function get(int $id): User;
    public function add(array $params): bool;
    public function update(int $id, array $params): bool;
    public function delete(int $id): bool;

}
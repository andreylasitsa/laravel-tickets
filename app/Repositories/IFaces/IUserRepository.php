<?php

namespace App\Repositories\IFaces;

use App\Models\User;
use Kalnoy\Nestedset\Collection;

interface IUserRepository
{
    public function getAll(): Collection;
    public function get($id): User;
    public function add(User $user): int;
    public function update(User $user): void;
    public function delete($id): User;
}
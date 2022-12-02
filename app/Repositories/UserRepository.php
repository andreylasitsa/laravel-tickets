<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\IFaces\IUserRepository;
use Kalnoy\Nestedset\Collection;

class UserRepository implements IUserRepository
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll(): Collection
    {
        return $this->user::all();
    }

    public function get($id): User
    {
        return $this->user->find($id);
    }

    public function add(User $user): int
    {
        $user->save();
        return $user->id;
    }

    public function update(User $user): void
    {
        $user->save();
    }

    public function delete($id): User
    {
        $user = $this->user->find($id);
        $user->delete();
        return $user;
    }
}
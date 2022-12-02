<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\IFaces\IUserRepository;
use App\Services\IFaces\IUserService;
use Illuminate\Database\Eloquent\Collection;

class UserService implements IUserService
{
    private IUserRepository $repository;

    public function __construct(IUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function get(int $id): User
    {
        return $this->repository->get($id);
    }

    public function add(array $params): bool
    {
        $user = new User();
        $user->setRawAttributes($params);
        $this->repository->add($user);
        return true;
    }

    public function update(int $id, array $params): bool
    {
        $user = $this->repository->get($id);
        $user->setRawAttributes($params);
        $this->repository->update($user);
        return true;
    }

    public function delete(int $id): bool
    {
        $this->repository->delete($id);
        return true;
    }

    public function getByEmail(string $email): User
    {
        return $this->repository->filter('email', $email)->get(0);
    }
}
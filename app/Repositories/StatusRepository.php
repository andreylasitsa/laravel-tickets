<?php

namespace App\Repositories;

use App\Models\Status;
use App\Repositories\IFaces\IStatusRepository;
use Kalnoy\Nestedset\Collection;

class StatusRepository implements IStatusRepository
{
    private Status $status;

    public function __construct(Status $status)
    {
        $this->status = $status;
    }


    public function getAll(): Collection
    {
        return $this->status::all();
    }

    public function get(int $id): Status
    {
        return $this->status->find($id);
    }

    public function exist(int $id): bool
    {
        return $this->status->get($id)->exists();
    }
}
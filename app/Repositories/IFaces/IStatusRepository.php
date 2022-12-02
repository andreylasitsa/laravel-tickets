<?php

namespace App\Repositories\IFaces;

use App\Models\Status;
use Kalnoy\Nestedset\Collection;

interface IStatusRepository
{
    public function getAll(): Collection;
    public function get(int $id): Status;
    public function exist(int $id): bool;
}
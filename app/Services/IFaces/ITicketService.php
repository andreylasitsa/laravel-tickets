<?php

namespace App\Services\IFaces;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Collection;

interface ITicketService
{
    public function add(array $params): bool;
    public function get(int $id): Ticket;
    public function getAll(): Collection;
    public function update(int $id, array $params): bool;
    public function delete(int $id): bool;
}

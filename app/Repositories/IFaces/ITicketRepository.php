<?php

namespace App\Repositories\IFaces;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Collection;

interface ITicketRepository
{
    public function getAll(): Collection;
    public function get(int $id): Ticket;
    public function add(Ticket $ticket): int;
    public function update(Ticket $ticket): void;
    public function delete(int $id): Ticket;
}

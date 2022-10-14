<?php

namespace App\Repositories;

use App\Models\Ticket;
use App\Repositories\IFaces\ITicketRepository;
use Illuminate\Database\Eloquent\Collection;

class TicketRepository implements ITicketRepository
{
    private Ticket $ticket;

    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function getAll(): Collection
    {
        return $this->ticket::all();
    }

    public function get(int $id): Ticket
    {
        return $this->ticket->first($id);
    }

    public function add(Ticket $ticket): int
    {
        $ticket->save();
        return $ticket->id;
    }

    public function update(Ticket $ticket): void
    {
        $ticket->save();
    }

    public function delete(int $id): Ticket
    {
        $ticket = $this->ticket->find($id);
        $ticket->delete();
        return $ticket;
    }
}

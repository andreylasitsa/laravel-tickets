<?php

namespace App\Services;

use App\Models\Ticket;
use App\Repositories\IFaces\ITicketRepository;
use App\Services\IFaces\ITicketService;
use Illuminate\Database\Eloquent\Collection;

class TicketService implements ITicketService
{
    private ITicketRepository $repository;

    public function __construct(ITicketRepository $repository)
    {
        $this->repository = $repository;
    }

    public function add(array $params): bool
    {
        $ticket = new Ticket();
        $ticket->setRawAttributes($params);
        $this->repository->add($ticket);
        return true;
    }

    public function get(int $id): Ticket
    {
        return $this->repository->get($id);
    }

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function update(int $id, array $params): bool
    {
        $ticket = $this->repository->get($id);
        $ticket->setRawAttributes($params);
        $this->repository->update($ticket);
        return true;
    }

    public function delete(int $id): bool
    {
        $this->repository->delete($id);
        return true;
    }
}

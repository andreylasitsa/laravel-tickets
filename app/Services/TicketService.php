<?php

namespace App\Services;

use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use App\Repositories\IFaces\IStatusRepository;
use App\Repositories\IFaces\ITicketRepository;
use App\Repositories\IFaces\IUserRepository;
use App\Services\IFaces\ITicketService;
use App\Services\IFaces\ITicketStatusesService;
use App\Services\IFaces\ITicketUsersService;
use Illuminate\Database\Eloquent\Collection;

class TicketService implements ITicketService, ITicketStatusesService, ITicketUsersService
{
    private ITicketRepository $repository;
    private IStatusRepository $statusRepository;
    private IUserRepository $userRepository;

    public function __construct(ITicketRepository $repository, IStatusRepository $statusRepository, IUserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->statusRepository = $statusRepository;
        $this->userRepository = $userRepository;
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

    public function getTicketStatus(int $id): Status
    {
        $ticket = $this->get($id);
        return $this->statusRepository->get($ticket->status_id);
    }

    public function changeTicketStatus($id, $statusId): bool
    {
        $ticket = $this->get($id);
        if(!$this->statusRepository->exist($statusId))
            return false;

        $ticket->status_id = $statusId;
        $this->repository->update($ticket);
        return true;
    }

    public function getTicketUser(int $id): User
    {
        $ticket = $this->get($id);
        return $this->userRepository->get($ticket->user_id);
    }
}

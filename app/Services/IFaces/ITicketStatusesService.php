<?php

namespace App\Services\IFaces;

use App\Models\Status;

interface ITicketStatusesService
{
    public function getTicketStatus(int $id): Status;
    public function changeTicketStatus(int $id, int $statusId): bool;
}
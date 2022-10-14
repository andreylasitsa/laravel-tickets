<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\IFaces\ITicketService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TicketController extends Controller
{
    private ITicketService $service;

    public function __construct(ITicketService $service)
    {
        $this->service = $service;
    }

    public function index(): Response|JsonResponse
    {
        $tickets = $this->service->getAll();
        return !($tickets->isEmpty()) ?
            response()->setStatusCode(200)->json(['tickets' => $tickets]) :
            response()->setStatusCode(404);
    }

    public function createTicket(Request $request): Response
    {
        $params = $request->all();
        $params = array_merge($params, ['user_id' => 1]);
        $this->service->add($params);
        return response()->setStatusCode(200);
    }

    public function changeTicketStatus(int $id, Request $request): Response
    {
        $params = ['status_id' => $request->get('status_id')];
        $this->service->update($id, $params);
        return response()->setStatusCode(200);
    }
}

<?php

namespace Tests\Unit;

use App\Services\TicketService;
use Tests\TestCase;

class TicketTest extends TestCase
{
    /**
     * @dataProvider ticketProvider
     */
    public function testTicketAdd($title, $text, $userId)
    {
        $service = $this->app->make(TicketService::class);
        $params = [
            'title' => $title,
            'text' => $text,
            'user_id' => $userId
        ];
        $service->add($params);
        $lastTicket = $service->getAll()->last();
        $this->assertSame($title, $lastTicket->title);
        $this->assertSame($text, $lastTicket->text);
        $this->assertSame($userId, $lastTicket->user_id);
        return $lastTicket;
    }


    /**
     * @depends testTicketAdd
     */
    public function testTicketUpdate($ticket)
    {
        $status = 2;
        $service = $this->app->make(TicketService::class);
        $service->update($ticket->id, ['status_id' => $status]);
        $lastTicket = $service->getAll()->last();
        $this->assertSame($status, $lastTicket->status_id);
        return $lastTicket;
    }

    /**
     * @depends testTicketUpdate
     */
    public function testTicketDelete($ticket)
    {
        $service = $this->app->make(TicketService::class);
        $ticketId = $ticket->id;
        $service->delete($ticketId);
        $lastTicket = $service->getAll()->last();
        $this->assertNotSame($ticketId, $lastTicket->id);
    }

    public function ticketProvider(): array
    {
        return [
            ['title' => 'test title', 'text' => 'test text', 'user_id' => 1]
        ];
    }
}
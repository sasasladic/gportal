<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\TicketRepositoryInterface;
use App\Ticket;
use Illuminate\Http\Response;

class TicketController extends Controller
{

    protected $tickets;

    /**
     * TicketController constructor.
     * @param TicketRepositoryInterface $tickets
     *
     */
    public function __construct(
        TicketRepositoryInterface $tickets
    ) {
        $this->tickets = $tickets;
    }

    /**
     * Display a listing of the tickets.
     *
     * @return Response
     */
    public function index()
    {
        $tickets = $this->tickets->all();
        return view('admin.ticket.index', ['data' => $tickets]);
    }

    /**
     * Display the specified ticket.
     *
     * @param Ticket $ticket
     * @return Response
     */
    public function show(Ticket $ticket)
    {
        return view('admin.ticket.show', ['data' => $ticket]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Repositories\TicketRepositoryInterface;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

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

    public function addComment(Request $request, Ticket $ticket)
    {
        $user = Auth::user();
        $comment = Comment::create([
            'content' => $request->get('content'),
            'user_id' => $user->id,
            'ticket_id' => $ticket->id
        ]);
        return view('admin.ticket.show', ['data' => $ticket]);
    }
}

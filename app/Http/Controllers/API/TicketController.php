<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function create(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'priority' => 'required',
            'description' => 'required|max:500',
        ]);
        $user = auth()->user();

        $data['user_id'] = $user->id;
        $data['status'] = 1;

        Ticket::create(
            $data
        );

        return response(['message' => 'You have created ticket successfully!']);

    }
    public function userTickets()
    {
        $user = auth()->user();
        $tickets = Ticket::where('user_id', $user->id)->get();
        return $tickets;
    }
}

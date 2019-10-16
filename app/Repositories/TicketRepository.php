<?php


namespace App\Repositories;


use App\Ticket;
use Illuminate\Database\Eloquent\Model;

class TicketRepository implements TicketRepositoryInterface
{

    public function all()
    {
        return Ticket::all();
    }

    public function get($id)
    {
        return Ticket::find($id);
    }

    public function update(Model $model)
    {
        return $model->update();
    }

    public function delete(Model $model)
    {
        return $model->delete();
    }
}

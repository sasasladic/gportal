<?php


namespace App\Repositories;


use App\Ticket;
use Illuminate\Database\Eloquent\Model;

class TicketRepository implements MainRepositoryInterface
{

    public function store(array $attributes)
    {
        // TODO: Implement store() method.
    }

    public function all()
    {
        return Ticket::all();
    }

    public function get($id)
    {
        return Ticket::find($id);
    }

    public function update(Model $model, array $attributes)
    {
        return $model->update($attributes);
    }

    public function delete(Model $model)
    {
        return $model->delete();
    }

}

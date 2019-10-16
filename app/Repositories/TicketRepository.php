<?php


namespace App\Repositories;


use App\Ticket;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TicketRepository implements TicketRepositoryInterface
{

    public function store(array $attributes): bool
    {
        // TODO: Implement store() method.
    }

    public function all(): Collection
    {
        return Ticket::all();
    }

    public function get($id): Ticket
    {
        return Ticket::find($id);
    }

    public function update(Model $model, array $attributes): bool
    {
        return $model->update($attributes);
    }

    public function delete(Model $model): bool
    {
        return $model->delete();
    }
}

<?php


namespace App\Repositories;


use App\Ticket;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface TicketRepositoryInterface
{
    public function store(array $attributes): bool;

    public function all(): Collection;

    public function get($id): Ticket;

    public function update(Model $model, array $attributes): bool;

    public function delete(Model $model): bool;

}
<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

interface TicketRepositoryInterface
{
    public function all();

    public function get($id);

    public function update(Model $model);

    public function delete(Model $model);
}

<?php


namespace App\Repositories;

use App\Server;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ServerRepositoryInterface
{
    public function store(array $attributes): bool;

    public function all(): Collection;

    public function get($id): Server;

    public function getUserServers($user_id): Collection;

    public function update(Model $model, array $attributes): bool;

    public function delete(Model $model): bool;

}

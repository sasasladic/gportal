<?php


namespace App\Repositories;


use App\Server;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ServerRepository implements ServerRepositoryInterface
{

    public function store(array $attributes): bool
    {
        $attributes['price'] = '10.0';
        $attributes['status'] = 1;
        $server = new Server($attributes);
        return $server->save();
    }

    public function all(): Collection
    {
        return Server::all();
    }

    public function get($id): Server
    {
        return Server::find($id);
    }

    public function getUserServers($user_id): Collection
    {
        return Server::where('user_id', $user_id)->get();
    }

    public function update(Model $model, array $attributes): bool
    {
        return $model->update($attributes);
    }

    public function delete(Model $model): bool
    {
        try {
            return $model->delete();
        } catch (\Exception $exception) {
            return false;
        }
    }
}

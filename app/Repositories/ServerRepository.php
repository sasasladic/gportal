<?php


namespace App\Repositories;


use App\Server;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ServerRepository implements ServerRepositoryInterface
{

    public function store(array $attributes): bool
    {
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

    public function getUserServers($userId): Collection
    {
        return Server::where('user_id', $userId)->get();
    }

    public function findByGameId($id): Collection
    {
        return Server::where('game_id', $id)->get();
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

    public function findByMachineAndGame($machineId, $gameId): Collection
    {
        return Server::where('machine_id', $machineId)->where('game_id', $gameId)->get();
    }
}

<?php


namespace App\Repositories;


use App\Mod;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ModRepository implements ModRepositoryInterface
{

    public function store(array $attributes): bool
    {
        $mod = new Mod($attributes);
        return $mod->save();
    }

    public function all(): Collection
    {
        return Mod::all();
    }

    public function get($id): Mod
    {
        return Mod::find($id);
    }

    public function findByGameId($id): Collection
    {
        return Mod::where('game_id', $id)->get();
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

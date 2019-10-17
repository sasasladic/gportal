<?php


namespace App\Repositories;


use App\Mod;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ModRepository implements ModRepositoryInterface
{

    public function store(array $attributes): bool
    {
        try {
            $mod = new Mod($attributes);
            return $mod->save();
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function all(): Collection
    {
        return Mod::all();
    }

    public function get($id): Mod
    {
        return Mod::find($id);
    }

    public function update(Model $model, array $attributes): bool
    {
        try {
            return $model->update($attributes);
        } catch (\Exception $exception) {
            return false;
        }
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
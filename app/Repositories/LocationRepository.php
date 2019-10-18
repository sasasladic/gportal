<?php


namespace App\Repositories;


use App\Location;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class LocationRepository implements LocationRepositoryInterface
{

    public function store(array $attributes): bool
    {
        try {
            $game = new Location($attributes);
            return $game->save();
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function all(): Collection
    {
        return Location::all();
    }

    public function get($id): Location
    {
        return Location::find($id);
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
            return $model->delete() ? true : false;
        } catch (\Exception $exception) {
            return false;
        }
    }
}
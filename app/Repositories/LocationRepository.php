<?php


namespace App\Repositories;


use App\Location;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class LocationRepository implements LocationRepositoryInterface
{

    public function store(array $attributes): bool
    {
        $game = new Location($attributes);
        return $game->save();
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
        return $model->update($attributes);
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

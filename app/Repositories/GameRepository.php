<?php


namespace App\Repositories;

use App\Game;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class GameRepository implements GameRepositoryInterface
{

    public function store(array $attributes): bool
    {
        $game = new Game($attributes);
        return $game->save();
    }

    public function all(): Collection
    {
        return Game::all();
    }

    public function get($id): Game
    {
        return Game::find($id);
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

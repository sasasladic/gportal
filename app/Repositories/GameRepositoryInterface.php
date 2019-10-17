<?php


namespace App\Repositories;

use App\Game;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface GameRepositoryInterface
{

    public function store(array $attributes): bool;

    public function all(): Collection;

    public function get($id): Game;

    public function update(Model $model, array $attributes): bool;

    public function delete(Model $model): bool;

}
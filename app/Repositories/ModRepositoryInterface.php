<?php


namespace App\Repositories;

use App\Mod;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ModRepositoryInterface
{

    public function store(array $attributes): bool;

    public function all(): Collection;

    public function get($id): Mod;

    public function findByGameId($id): Collection;

    public function update(Model $model, array $attributes): bool;

    public function delete(Model $model): bool;

}

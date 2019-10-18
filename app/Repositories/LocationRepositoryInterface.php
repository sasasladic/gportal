<?php


namespace App\Repositories;


use App\Location;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface LocationRepositoryInterface
{

    public function store(array $attributes): bool;

    public function all(): Collection;

    public function get($id): Location;

    public function update(Model $model, array $attributes): bool;

    public function delete(Model $model): bool;

}
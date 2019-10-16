<?php

namespace App\Repositories;

use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


interface UserRepositoryInterface
{
    public function store(array $attributes): bool;

    public function all(): Collection;

    public function get($id): User;

    public function update(Model $model, array $attributes): bool;

    public function delete(Model $model): bool;
}
<?php

namespace App\Repositories;

use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements UserRepositoryInterface
{

    public function store(array $attributes): bool
    {
        try {
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function all(): Collection
    {
        return User::all();
    }

    public function get($id): User
    {
        return User::find($id);
    }

    public function update(Model $model, array $attributes): bool
    {
        try {

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

<?php

namespace App\Repositories;

use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{

    public function store(array $attributes): bool
    {
        try {
            if ($attributes['password'] != null) {
                $attributes['password'] = Hash::make($attributes['password']);
            } else {
                unset($attributes['password']);
            }
            $attributes['status'] = 1;
            $user = new User($attributes);

            return $user->save();
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
            if ($attributes['password'] != null) {
                $attributes['password'] = Hash::make($attributes['password']);
            } else {
                unset($attributes['password']);
            }
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
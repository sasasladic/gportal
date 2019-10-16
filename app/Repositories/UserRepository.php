<?php

namespace App\Repositories;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserRepository implements MainRepositoryInterface
{

    public function store(array $attributes)
    {
        if ($attributes['password'] != null) {
            $attributes['password'] = Hash::make($attributes['password']);
        } else {
            unset($attributes['password']);
        }
        $attributes['status'] = 1;
        $user = new User($attributes);

        return $user->save();
    }

    public function all()
    {
        return User::all();
    }

    public function get($id)
    {
        return User::find($id);
    }

    public function update(Model $model, array $attributes)
    {
        if ($attributes['password'] != null) {
            $attributes['password'] = Hash::make($attributes['password']);
        } else {
            unset($attributes['password']);
        }
        return $model->update($attributes);
    }

    public function delete(Model $model)
    {
        return $model->delete();
    }
}
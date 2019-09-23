<?php

namespace App\Repositories;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements UserRepositoryInterface
{

    public function all()
    {
        return User::all();
    }

    public function get($id)
    {
        return User::find($id);
    }

    public function update(Model $model)
    {
        return $model->update();
    }

    public function delete(Model $model)
    {
        return $model->delete();
    }
}
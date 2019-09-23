<?php

namespace App\Repositories;

use App\Role;
use Illuminate\Database\Eloquent\Model;

class RoleRepository implements RoleRepositoryInterface
{

    public function all()
    {
        return Role::all();
    }

    public function get($id)
    {
        return Role::findOrFail($id);
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
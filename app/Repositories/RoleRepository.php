<?php

namespace App\Repositories;

use App\Role;
use Illuminate\Database\Eloquent\Collection;

class RoleRepository implements RoleRepositoryInterface
{

    public function all(): Collection
    {
        return Role::all();
    }

    public function get($id): Role
    {
        return Role::find($id);
    }
}
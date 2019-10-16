<?php

namespace App\Repositories;

use App\Role;
use Illuminate\Database\Eloquent\Collection;

interface RoleRepositoryInterface
{
    public function all(): Collection;

    public function get($id): Role;
}
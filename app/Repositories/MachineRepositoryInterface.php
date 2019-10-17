<?php


namespace App\Repositories;

use App\Machine;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface MachineRepositoryInterface
{

    public function store(array $attributes): bool;

    public function all(): Collection;

    public function get($id): Machine;

    public function update(Model $model, array $attributes): bool;

    public function delete(Model $model): bool;

}
<?php


namespace App\Repositories;


use App\Machine;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class MachineRepository implements MachineRepositoryInterface
{

    public function store(array $attributes): bool
    {
        try {
            $mod = new Machine($attributes);
            return $mod->save();
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function all(): Collection
    {
        return Machine::all();
    }

    public function get($id): Machine
    {
        return Machine::find($id);
    }

    public function update(Model $model, array $attributes): bool
    {
        try {
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
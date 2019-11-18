<?php


namespace App\Repositories;


use App\Machine;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class MachineRepository implements MachineRepositoryInterface
{

    public function store(array $attributes): bool
    {
        $machine = new Machine($attributes);
        return $machine->save();
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
        return $model->update($attributes);
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

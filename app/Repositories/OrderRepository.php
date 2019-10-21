<?php


namespace App\Repositories;


use App\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OrderRepository implements OrderRepositoryInterface
{

    public function store(array $attributes): bool
    {
        try {
            $game = new Order($attributes);
            return $game->save();
        } catch (\Exception $exception) {
            return false;
        }
    }

    public function all(): Collection
    {
        return Order::all();
    }

    public function get($id): Order
    {
        return Order::find($id);
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
            return $model->delete() ? true : false;
        } catch (\Exception $exception) {
            return false;
        }
    }
}
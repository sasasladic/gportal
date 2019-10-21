<?php


namespace App\Repositories;

use App\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface OrderRepositoryInterface
{

    public function store(array $attributes): bool;

    public function all(): Collection;

    public function get($id): Order;

    public function update(Model $model, array $attributes): bool;

    public function delete(Model $model): bool;

}
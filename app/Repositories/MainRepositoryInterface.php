<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

interface MainRepositoryInterface
{
    public  function store(array $attributes);

    public function all();

    public function get($id);

    public function update(Model $model, array $attributes);

    public function delete(Model $model);

}
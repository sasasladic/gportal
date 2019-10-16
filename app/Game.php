<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'short_name'
    ];

    public function orders()
    {
        return $this->hasMany(Game::class);
    }

    public function mods()
    {
        return $this->hasMany(Mod::class);
    }
}

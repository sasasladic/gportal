<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function orders(){
        return $this->hasMany(Game::class);
    }
}

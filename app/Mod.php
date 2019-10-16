<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mod extends Model
{
    protected $fillable = [
        'name',
        'description',
        'link',
        'default_map',
        'game_id'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function servers()
    {
        return $this->hasMany(Server::class);
    }
}

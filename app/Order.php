<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'game_id'
    ];

    public function game(){
        return $this->belongsTo(Game::class);
    }
}

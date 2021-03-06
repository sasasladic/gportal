<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 */
class Server extends Model
{
    protected $fillable = [
        'name',
        'port',
        'username',
        'password',
        'slots',
        'price_per_slot',
        'status',
        'expire_on',
        'machine_id',
        'mod_id',
        'user_id',
        'game_id'
    ];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    public function mod()
    {
        return $this->belongsTo(Mod::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 */
class Location extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'city',
        'country'
    ];

    public function machines()
    {
        return $this->hasMany(Machine::class);
    }

    public function games()
    {
        return $this->belongsToMany(Game::class)->withPivot('price');
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

}

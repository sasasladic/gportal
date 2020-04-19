<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static find($id)
 */
class Game extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'short_name',
        'image_id',
        'min_slots',
        'max_slots',
        'min_gigabytes',
        'max_gigabytes',
        'increase_by',
        'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function mods()
    {
        return $this->hasMany(Mod::class);
    }

    /**
     * Return image associated with the game.
     * @return BelongsTo
     */
    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function server()
    {
        return $this->hasMany(Server::class);
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class)->withPivot('price');
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

}

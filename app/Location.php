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
        'address'
    ];

    public function machines()
    {
        return $this->hasMany(Machine::class);
    }
}

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
        'slot_per_month'
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
}

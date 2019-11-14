<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path',
        'alt'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}

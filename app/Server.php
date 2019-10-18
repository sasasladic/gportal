<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $fillable = [
        'name',
        'slots',
        'port',
        'username',
        'password',
        'price',
        'expire_on',
        'machine_id',
        'mod_id',
        'user_id'
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
}

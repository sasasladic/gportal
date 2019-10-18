<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{

    protected $fillable = [
        'ip_address',
        'name',
        'ssh_port',
        'ssh_username',
        'ssh_password',
        'location_id'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function servers()
    {
        return $this->hasMany(Server::class);
    }


}

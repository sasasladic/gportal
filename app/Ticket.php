<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'title',
        'description',
        'priority',
        'status',
        'user_id',
        'created_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

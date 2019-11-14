<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'server_id',
        'order_status_id',
        'image_id'
    ];

    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    public function order_status()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}

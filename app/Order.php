<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find($id)
 */
class Order extends Model
{
    protected $fillable = [
        'order_no',
        'user_id',
        'game_id',
        'location_id',
        'mod_id',
        'slots',
        'gigabytes',
        'order_status_id',
        'image_id',
        'payment_method',
        'price_without_discount',
        'discount',
        'price',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function mod()
    {
        return $this->belongsTo(Mod::class);
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

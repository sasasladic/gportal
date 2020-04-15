<?php

use App\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'order_no' => 1,
            'user_id' => 1,
            'server_id' => 1,
            'order_status_id' => 2,
            'image_id' => 2,
            'price' => 100
        ]);
    }
}

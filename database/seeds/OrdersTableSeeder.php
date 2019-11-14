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
            'user_id' => 1,
            'server_id' => 1,
            'order_status_id' => 1,
            'image_id'=>2
        ]);
    }
}

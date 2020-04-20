<?php

use App\OrderStatus;
use Illuminate\Database\Seeder;

class OrderStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderStatus::create([
            'name' => 'Approved'
        ]);
        OrderStatus::create([
            'name' => 'Rejected'
        ]);
        OrderStatus::create([
            'name' => 'Waiting to approve'
        ]);
    }
}

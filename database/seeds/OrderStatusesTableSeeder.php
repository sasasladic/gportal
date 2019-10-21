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
            'name' => 'Active'
        ]);
        OrderStatus::create([
            'name' => 'Inactive'
        ]);
        OrderStatus::create([
            'name' => 'Suspended'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TicketsTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(GameTableSeeder::class);
        $this->call(ModTableSeeder::class);
        $this->call(MachinesTableSeeder::class);
        $this->call(ServersTableSeeder::class);
        $this->call(OrderStatusesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);

    }
}

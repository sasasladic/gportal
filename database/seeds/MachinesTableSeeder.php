<?php

use App\Machine;
use Illuminate\Database\Seeder;

class MachinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Machine::create([
            'ip_address' => '127.0.0.1',
            'name' => 'Test machine',
            'ssh_port' => '8080',
            'root_username' => 'ssladic',
            'root_password' => 'neznam123',
            'location_id' => 1,
            'price_per_slot' => 0.4,
            'ping' => 30
        ]);
    }
}

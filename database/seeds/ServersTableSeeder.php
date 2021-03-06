<?php

use App\Server;
use Illuminate\Database\Seeder;

class ServersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Server::create([
            'name' => 'Test server',
            'port' => 3306,
            'username' => 'test',
            'password' => 'test',
            'slots' => 12,
            'price_per_slot' => 0.41,
            'status' => 2,
            'expire_on' => date("Y-m-d H:i:s"),
            'machine_id' => 1,
            'mod_id' => 1,
            'user_id' => 1,
            'game_id' => 1
        ]);
    }
}

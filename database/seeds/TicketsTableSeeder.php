<?php

use App\Ticket;
use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::create([
            'title' => 'First ticket',
            'description' => 'How can I get server for hanging out with my friends ?',
            'priority' => 'Urgent',
            'status' => 1,
            'user_id' => 1
        ]);
    }
}

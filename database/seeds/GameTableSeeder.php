<?php

use App\Game;
use Illuminate\Database\Seeder;

class GameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::create([
            'name' => 'Counter Strike 1.6',
            'short_name' => 'CS 1.6'
        ]);

    }
}
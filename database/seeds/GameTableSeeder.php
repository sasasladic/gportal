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
            'short_name' => 'CS 1.6',
            'image_id' => 3,
            'slot_per_month' => 0.41,
            'description' => 'Counter-Strike: Global Offensive (CS: GO) will expand upon the team-based action gameplay
             that it pioneered when it was launched 14 years ago.CS: GO features new maps, characters, and weapons and
              delivers updated versions of the classic CS content (de_dust2, etc.). In addition, CS: GO will introduce
               new gameplay modes, matchmaking, leader boards, and more.'
        ]);

    }
}

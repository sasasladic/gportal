<?php

use App\Game;
use App\Location;
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
        $location = new Location();
        $location->city = 'München';
        $location->country = 'Germany';
        $location->save();

        $location2 = new Location();
        $location2->city = 'Belgrade';
        $location2->country = 'Serbia';
        $location2->save();

        $game = new Game();
        $game->name = 'Counter Strike 1.6';
        $game->short_name =  'CS 1.6';
        $game->image_id = 3;
        $game->min_slots = 12;
        $game->max_slots = 32;
        $game->increase_by = 2;
        $game->description ='Counter-Strike: Global Offensive (CS: GO) will expand upon the team-based action gameplay
             that it pioneered when it was launched 14 years ago.CS: GO features new maps, characters, and weapons and
              delivers updated versions of the classic CS content (de_dust2, etc.). In addition, CS: GO will introduce
               new gameplay modes, matchmaking, leader boards, and more.';
        $game->save();
        $game->locations()->attach($location->id,['price' => 0.5]);
        $game->locations()->attach($location2->id,['price' => 0.7]);


    }
}

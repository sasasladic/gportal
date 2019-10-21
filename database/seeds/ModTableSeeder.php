<?php

use App\Mod;
use Illuminate\Database\Seeder;

class ModTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mod::create([
            'name' => 'Painball',
            'description' => 'The most played mod!',
            'link' => 'Download link',
            'default_map' => 'Astec',
            'game_id' => 1
        ]);
    }
}

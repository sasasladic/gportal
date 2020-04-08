<?php

use App\Location;
use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'city' => 'München',
            'country' => 'Germany',
        ]);
        Location::create([
            'city' => 'Belgrade',
            'country' => 'Serbia',
        ]);
    }
}

<?php

use App\Image;
use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::create([
            'path' => '/storage/image/no-image.png',
            'alt' => 'no-image'
        ]);
        Image::create([
            'path' => '/storage/image/payment-slip.png',
            'alt' => 'payment-slip'
        ]);
        Image::create([
            'path' => '/storage/image/cs.jpg',
            'alt' => 'cs1.6'
        ]);
    }
}

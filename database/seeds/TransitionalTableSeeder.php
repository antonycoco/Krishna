<?php

use Illuminate\Database\Seeder;
use App\Models\Transitional;
use Faker\Generator as Faker;

class TransitionalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transitional::create([
            'imageUrlTemp'=>'image2.png',
            'user_id'=>2,
        ]);
        Transitional::create([
            'imageUrlTemp'=>'image3.png',
            'user_id'=>3,
        ]);
        Transitional::create([
            'imageUrlTemp'=>'image4.png',
            'user_id'=>1,
        ]);
        Transitional::create([
            'imageUrlTemp'=>'image5.png',
            'user_id'=>5,
        ]);
        Transitional::create([
            'imageUrlTemp'=>'image1.png',
            'user_id'=>4,
        ]);

    }
}

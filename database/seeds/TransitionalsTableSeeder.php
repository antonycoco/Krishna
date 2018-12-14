<?php

use Illuminate\Database\Seeder;
use App\Models\Transitional;
use Faker\Generator as Faker;

class TransitionalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transitional::create([
            'imageUrlTemp'=>'./images/avatars_submit/image'.rand(),
        ]);
        Transitional::create([
            'imageUrlTemp'=>'./images/avatars_submit/image'.rand(),
        ]);
        Transitional::create([
            'imageUrlTemp'=>'./images/avatars_submit/image'.rand(),
        ]);
        Transitional::create([
            'imageUrlTemp'=>'./images/avatars_submit/image'.rand(),
        ]);
        Transitional::create([
            'imageUrlTemp'=>'./images/avatars_submit/image'.rand(),
        ]);

    }
}

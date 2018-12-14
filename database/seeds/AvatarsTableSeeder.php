<?php

use Illuminate\Database\Seeder;

class AvatarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transitional::create([
            'imageUrlTemp'=>'./images/avatars_user/image'.rand(),
        ]);
        Transitional::create([
            'imageUrlTemp'=>'./images/avatars_user/image'.rand(),
        ]);
        Transitional::create([
            'imageUrlTemp'=>'./images/avatars_user/image'.rand(),
        ]);
        Transitional::create([
            'imageUrlTemp'=>'./images/avatars_user/image'.rand(),
        ]);
        Transitional::create([
            'imageUrlTemp'=>'./images/avatars_user/image'.rand(),
        ]);
    }
}

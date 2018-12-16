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
            'imageUrlTemp'=>'./images/avatars_submit/image2',
            'user_id'=>2,
        ]);
        Transitional::create([
            'imageUrlTemp'=>'./images/avatars_submit/image3',
            'user_id'=>3,
        ]);
        Transitional::create([
            'imageUrlTemp'=>'./images/avatars_submit/image4',
            'user_id'=>1,
        ]);
        Transitional::create([
            'imageUrlTemp'=>'./images/avatars_submit/image5',
            'user_id'=>5,
        ]);
        Transitional::create([
            'imageUrlTemp'=>'./images/avatars_submit/image1',
            'user_id'=>4,
        ]);

    }
}

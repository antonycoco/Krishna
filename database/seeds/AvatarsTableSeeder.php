<?php

use Illuminate\Database\Seeder;
use App\Models\Avatar;
class AvatarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Avatar::create([
            'imageUrl'=>'image1.jpg',
            'imageValider'=>true,
            'user_id'=>1,
        ]);
        Avatar::create([
            'imageUrl'=>'image2.jpg',
            'user_id'=>2,
        ]);
        Avatar::create([
            'imageUrl'=>'image3.jpg',
            'user_id'=>3,
        ]);
        Avatar::create([
            'imageUrl'=>'image4.jpg',
            'imageValider'=>true,
            'user_id'=>4,
        ]);
        Avatar::create([
            'imageUrl'=>'image5.jpg',
            'user_id'=>5,
        ]);
        Avatar::create([
            'imageUrl'=>'image6.png',
            'imageValider'=>true,
            'user_id'=>6,
        ]);

    }
}

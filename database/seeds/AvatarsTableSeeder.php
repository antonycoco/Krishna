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
            'imageUrl'=>'default.png',
            'user_id'=>1,
        ]);
        Avatar::create([
            'imageUrl'=>'default.png',
            'user_id'=>2,
        ]);
        Avatar::create([
            'imageUrl'=>'default.png',
            'user_id'=>3,
        ]);
        Avatar::create([
            'imageUrl'=>'default.png',
            'user_id'=>4,
        ]);
        Avatar::create([
            'imageUrl'=>'default.png',
            'user_id'=>5,
        ]);
        Avatar::create([
            'imageUrl'=>'default.png',
            'user_id'=>6,
        ]);

    }
}

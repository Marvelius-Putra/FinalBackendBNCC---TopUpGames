<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            [
                'name' => 'Games',
                'image' => 'game.jpg',

            ],
            [
                'name' => 'Virus',
                'image' => 'virus.jpg',
            ],
            [
                'name' => 'Robots',
                'image' => 'robot.gif',
            ],
        ];

        foreach ($kategori as $k) {
            DB::table('kategoris')->insert([
                'name'=>$k['name'],
                'image'=>$k['image'],
            ]);
        }
    }
}

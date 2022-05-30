<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $barang = [
            [
                'name' => 'Genshin Impact',
                'image' => 'genshin_logo.png',
                'harga'=> 25000,
                'jumlah' => 1,
                'kategori_id' => 1
            ],
            [
                'name' => 'Honkai Impact',
                'image' => 'griseo.jpg',
                'harga'=> '30000',
                'jumlah' => '6',
                'kategori_id' => 2
            ],
            [
                'name' => 'Valorant',
                'image' => 'valorant.jpg',
                'harga'=> '45000',
                'jumlah' => '4',
                'kategori_id' => 3
            ],
        ];

        foreach ($barang as $b){
            DB::table('barangs')->insert([
                'name'=>$b['name'],
                'image'=>$b['image'],
                'harga' =>  $b['harga'],
                'jumlah' => $b['jumlah'],
                'kategori_id' => $b['kategori_id']
            ]);
        }
    }
}

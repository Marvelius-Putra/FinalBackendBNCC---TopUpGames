<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'marvel',
            'email'=> 'marvel@gmail.com',
            'password'=> bcrypt('marvel'),
            'phone_number' => '081313423'
        ]);

        DB::table('users')->insert([
            'name' => 'ethan',
            'email'=> 'ethan@gmail.com',
            'password'=> bcrypt('ethan'),
            'phone_number' => '08147334',
            'role' => 'admin'
        ]);
        $this->call([
            KategoriSeeder::class,
            BarangSeeder::class
        ]);
    }
}

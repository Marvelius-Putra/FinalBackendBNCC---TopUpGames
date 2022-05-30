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
            'password'=> bcrypt('marvel')
        ]);

        DB::table('users')->insert([
            'name' => 'miko',
            'email'=> 'miko@gmail.com',
            'password'=> bcrypt('teyvat'),
            'role' => 'admin'
        ]);
        $this->call([
            KategoriSeeder::class,
            BarangSeeder::class
        ]);
    }
}

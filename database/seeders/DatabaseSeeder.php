<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Database\Seeders\UserSeeder;

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

        // \App\Models\User::factory()->create([
        //     'username' => 'iqlimatul',
        //     'password' => bcrypt('1234'),
        //     'address' => 'malang',
        //     'role' => 'user',
        //     'remember_token' => Str::random(40),

        //     'username' => 'reykazuko',
        //     'password' => bcrypt('1234'),
        //     'address' => 'pandaan',
        //     'role' => 'admin',
        //     'remember_token' => Str::random(40),
        // ]);
            $this->call([
                UserSeeder::class
            ]);
    }
}

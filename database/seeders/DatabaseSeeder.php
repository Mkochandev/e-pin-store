<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            Admins::class,
        ]);
        $this->call([
            CategoriesSeeder::class,
        ]);
        $this->call([
            GameModeSeeder::class,
        ]);
        $this->call([
            PlatformSeeder::class,
        ]);
        $this->call([
            RatedSeeder::class,
        ]);    
        $this->call([
            AboutSeeder::class,
        ]);
        $this->call([
            ContactSeeder::class,
        ]);


    }
}

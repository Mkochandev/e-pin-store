<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $platforms = [
            ['name' => 'Steam', 'icon' => 'steam.png'],
            ['name' => 'PlayStation Store', 'icon' => 'psstore.png'],
            ['name' => 'Xbox', 'icon' => 'xbox.png'],
            ['name' => 'Epic Games', 'icon' => 'epic.png'],
            ['name' => 'Nintendo', 'icon' => 'nintendo.png'],
        ];

        foreach ($platforms as $platform) {
            \App\Models\Platform::create([
                'name' => $platform['name'],
                'icon' => $platform['icon'],
                'slug' => \Illuminate\Support\Str::slug($platform['name']),
            ]);
        }
    }
}

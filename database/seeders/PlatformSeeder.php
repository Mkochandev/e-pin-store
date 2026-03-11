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
        ['name' => 'Steam', 'icon' => 'platforms/steam.png'],
        ['name' => 'PlayStation Store', 'icon' => 'platforms/psstore.png'],
        ['name' => 'Xbox', 'icon' => 'platforms/xbox.png'],
        ['name' => 'Epic Games', 'icon' => 'platforms/epic.png'],
        ['name' => 'Nintendo', 'icon' => 'platforms/nintendo.png'],
    ];

    foreach ($platforms as $platform) {
        \App\Models\Platform::create([
            'name' => $platform['name'],
            'icon'=> $platform['icon'],
            'slug' => \Illuminate\Support\Str::slug($platform['name']),
        ]);
    }
    }
}

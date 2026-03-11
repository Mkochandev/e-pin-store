<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
        'Aksiyon',
        'Macera',
        'Strateji',
        'Korku',
        'Spor',
        'Simülasyon',
        'First-Person',
        'Third-Person',
        'Platformer',
        'Souls-Like',
        'Rouge-Like',
        'Japon Rol Yapma',
        'Puzzle',
        'MMO',
        'Fantezi',
        'Romantik',
        'Sıra Tabanlı',
        'Yarış',
        'Rol Yapma',
        'Hayatta Kalma',
        'Gerilim',
        'Dövüş',
        ];

    foreach ($categories as $cat) {
        \App\Models\Categories::create([
            'name' => $cat,
            'slug' => \Illuminate\Support\Str::slug($cat)
        ]);
    }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RatedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rates = [
            ['name' => 'PEGI 3', 'image' => 'pegi3.png', 'description' => 'Her yaş için uygun.'],
            ['name' => 'PEGI 7', 'image' => 'pegi7.png', 'description' => '7 yaş ve üzeri.'],
            ['name' => 'PEGI 12', 'image' => 'pegi12.png', 'description' => '12 yaş ve üzeri.'],
            ['name' => 'PEGI 16', 'image' => 'pegi16.png', 'description' => '16 yaş ve üzeri.'],
            ['name' => 'PEGI 18', 'image' => 'pegi18.png', 'description' => '+18 Yetişkin içerik.'],
        ];

        foreach ($rates as $rate) {
            \App\Models\Rated::create($rate);
        }
    }
}

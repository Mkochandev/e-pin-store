<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GameModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modes = [
            'Single-player',
            'Multi-player',
            'Online Co-op',
            'LAN Co-op',
            'Shared/Split Screen',
            'VR',
            ];

    foreach ($modes as $mode) {
        \App\Models\GameMode::create(['name' => $mode]);
    }
    }
}

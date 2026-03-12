<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $socials = [
            ['name' => 'Facebook', 'link' => 'https://www.facebook.com/gbbbilimmerkezi/'],
            ['name' => 'Twitter', 'link' => 'https://x.com/BilisimGbb'],
            ['name' => 'Instagram', 'link' => 'https://www.instagram.com/gbbbilisim/'],
            ['name' => 'LinkedIn', 'link' => 'https://www.linkedin.com/company/gbbbilisim/posts/?feedView=all'],
            ['name' => 'YouTube', 'link' => 'https://www.youtube.com/@GBBBilisim'],
        ];

        foreach ($socials as $social) {
            \App\Models\Social::create($social);
        }
    }
}

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
            ['name' => 'Facebook', 'link' => 'https://www.facebook.com/'],
            ['name' => 'Twitter', 'link' => 'https://www.twitter.com/'],
            ['name' => 'Instagram', 'link' => 'https://www.instagram.com/'],
            ['name' => 'LinkedIn', 'link' => 'https://www.linkedin.com/'],
            ['name' => 'YouTube', 'link' => 'https://www.youtube.com/'],
        ];

        foreach ($socials as $social) {
            \App\Models\Social::create($social);
        }
    }
}

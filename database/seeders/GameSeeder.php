<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $games = [
            [
                'name' => 'Grand Theft Auto V',
                'publisher' => 'Rockstar Games',
                'developer' => 'Rockstar Games',
                'description' => 'Grand Theft Auto V is an action-adventure game developed by Rockstar North and published by Rockstar Games. It is the fifteenth installment in the Grand Theft Auto series and was released in 2013. The game is set in the fictional state of San Andreas, which is based on Southern California. Players control three protagonists as they engage in various criminal activities, including heists, missions, and open-world exploration. Grand Theft Auto V received critical acclaim for its storytelling, gameplay, and open-world design, and it has become one of the best-selling video games of all time.',
                'image' => 'gta5.jpg',
                'release_date' => '2013-09-17',
                'rated_id' => 'PEGI 18',
            ],
            [
                'name' => 'The Witcher 3: Wild Hunt',
                'publisher' => 'CD Projekt',
                'developer' => 'CD Projekt Red',
                'description' => 'The Witcher 3: Wild Hunt is an action role-playing game developed by CD Projekt Red and published by CD Projekt. It is the third installment in The Witcher series and was released in 2015. The game is set in a fantasy world inspired by Slavic mythology and follows the story of Geralt of Rivia, a monster hunter known as a Witcher. Players explore a vast open world, complete quests, and engage in combat with various creatures. The Witcher 3 received widespread critical acclaim for its storytelling, world-building, and gameplay mechanics, and it won numerous Game of the Year awards.',
                'image' => 'witcher3.jpg',
                'release_date' => '2015-05-19',
                'rated_id' => 'PEGI 18',
            ],
            [
                'name' => 'Cyberpunk 2077',
                'publisher' => 'CD Projekt',
                'developer' => 'CD Projekt Red',
                'description' => 'Cyberpunk 2077 is an action role-playing game developed by CD Projekt Red and published by CD Projekt. It is set in the Cyberpunk universe and follows the story of V, a mercenary operating in the fictional city of Night City. Players explore a vast open world, complete quests, and engage in combat with various creatures. Cyberpunk 2077 received mixed reviews for its storytelling and gameplay mechanics, but it has a dedicated fanbase.',
                'image' => 'cyberpunk.jpg',
                'release_date' => '2020-12-10',
                'rated_id' => 'PEGI 18',
            ]
        ];
        foreach ($games as $data) {
            $rated = \App\Models\Rated::where('name', $data['rated_id'])->first();

            \App\Models\Game::create([
                'name' => $data['name'],
                'slug' => \Illuminate\Support\Str::slug($data['name']),
                'publisher' => $data['publisher'],
                'developer' => $data['developer'],
                'description' => $data['description'],
                'image' => $data['image'],
                'release_date' => $data['release_date'],
                'rated_id' => $rated ? $rated->id : null,
            ]);
        }
    }
}

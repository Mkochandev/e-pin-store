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
                'description' => 'Grand Theft Auto V, Rockstar North tarafından geliştirilen ve Rockstar Games tarafından yayınlanan bir aksiyon-macera oyunudur. Grand Theft Auto serisinin on beşinci oyunudur ve 2013 yılında piyasaya sürülmüştür. Oyun, Güney Kaliforniya yı temel alan kurgusal San Andreas eyaletinde geçmektedir. Oyuncular, soygunlar, görevler ve açık dünya keşfi de dahil olmak üzere çeşitli suç faaliyetlerinde bulunan üç ana karakteri kontrol eder. Grand Theft Auto V, hikaye anlatımı, oynanışı ve açık dünya tasarımıyla eleştirmenlerden büyük beğeni toplamış ve tüm zamanların en çok satan video oyunlarından biri olmuştur.',
                'image' => 'gta5.jpg',
                'release_date' => '2013-09-17',
                'rated_id' => 'PEGI 18',
            ],
            [
                'name' => 'The Witcher 3: Wild Hunt',
                'publisher' => 'CD Projekt',
                'developer' => 'CD Projekt Red',
                'description' => 'The Witcher 3: Wild Hunt, CD Projekt Red tarafından geliştirilen ve CD Projekt tarafından yayınlanan bir aksiyon rol yapma oyunudur. The Witcher serisinin üçüncü oyunudur ve 2015 yılında piyasaya sürülmüştür. Oyun, Slav mitolojisinden esinlenilmiş bir fantastik dünyada geçmektedir ve bir Witcher olarak bilinen canavar avcısı Geralt of Rivia nın hikayesini anlatmaktadır. Oyuncular geniş bir açık dünyayı keşfeder, görevleri tamamlar ve çeşitli yaratıklarla savaşırlar. The Witcher 3, hikaye anlatımı, dünya inşası ve oyun mekanikleriyle geniş çapta beğeni toplamış ve çok sayıda Yılın Oyunu ödülü kazanmıştır.',
                'image' => 'witcher3.jpg',
                'release_date' => '2015-05-19',
                'rated_id' => 'PEGI 18',
            ],
            [
                'name' => 'Cyberpunk 2077',
                'publisher' => 'CD Projekt',
                'developer' => 'CD Projekt Red',
                'description' => 'Cyberpunk 2077, CD Projekt Red tarafından geliştirilen ve CD Projekt tarafından yayınlanan bir aksiyon rol yapma oyunudur. Cyberpunk evreninde geçen oyun, kurgusal Night City şehrinde faaliyet gösteren bir paralı asker olan V nin hikayesini konu almaktadır. Oyuncular geniş bir açık dünyayı keşfeder, görevleri tamamlar ve çeşitli yaratıklarla savaşırlar. Cyberpunk 2077, hikaye anlatımı ve oyun mekanikleri açısından karışık eleştiriler alsa da, sadık bir hayran kitlesine sahiptir. Oyun, 2020 yılında piyasaya sürülmüştür ve çeşitli platformlarda mevcuttur.',
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

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aboutData = [
            'title' => 'Güvenilir E-Pin Tedarikçiniz',
            'description' => ' Oyun dünyasının kalbinde, en sevdiğiniz platformlar için en uygun fiyatlı çözümleri sunuyoruz. E-Pin Store olarak, Steam, PlayStation, Xbox ve Nintendo gibi dev platformlarda binlerce oyun anahtarını (key) anında teslimat garantisiyle sizlerle buluşturuyoruz.',
            'logo' => 'upload/about/logo.png',
        ];

        \App\Models\About::create($aboutData);
    }
}

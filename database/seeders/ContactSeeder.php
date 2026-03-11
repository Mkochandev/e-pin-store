<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts= [
                'address' => 'Müzeyyen Erkul Teknoloji Merkezi, No: 1, Şehitkamil / Gaziantep',
                'phone' => '+90 (000) 000 00 00',
                'email' => 'destek@epinstore.com',  
    ];
        \App\Models\Contact::create($contacts);
    }
}

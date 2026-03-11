<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; 

class Admins extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $items = [[
            'name' => 'Muhammed Kochan',
            'tc' => '11111111111',
            'title' => 'Admin',
            'phone' => '(000) 000 00 00',
            'email' => 'muhammed@gmail.com',
            'password' => Hash::make('123456'), 
            'is_active' => 1, 
        ],];  

        DB::table('admin')->insert($items);
    }
}

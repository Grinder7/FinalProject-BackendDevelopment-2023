<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Catalogue;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Catalogue::create([
            'name' => 'Indomie Goreng',
            'stock' => 10,
            'price' => 3100,
            'img' => '0lxKQl2mvqEh70XLvgIA.png',
        ]);
        Catalogue::create([
            'name' => 'Indomie Goreng Jumbo',
            'stock' => 15,
            'price' => 4300,
            'img' => 'Iyo3eLTieosZSvRJTGQl.png',
        ]);
        Catalogue::create([
            'name' => 'Indomie Goreng Jumbo Rasa Ayam Panggang',
            'stock' => 5,
            'price' => 4200,
            'img' => 'AgjiGLoxvt5GDpk7bh8B.jpg',
        ]);
        Catalogue::create([
            'name' => 'Indomie Kuah Rasa Kaldu Ayam',
            'stock' => 20,
            'price' => 3000,
            'img' => 'HJpiy51TDS6Be8q2v8LE.jpg',
        ]);
        Catalogue::create([
            'name' => 'Indomie Kuah Rasa Ayam Bawang',
            'stock' => 23,
            'price' => 3000,
            'img' => 'zw34JULbUEUB3us1VzcW.jpg',
        ]);
        Catalogue::create([
            'name' => 'Indomie Goreng Premium Japanese Takoyaki',
            'stock' => 30,
            'price' => 5900,
            'img' => 'uZqpGDT91YEbzLHnzd7o.jpg',
        ]);
        Catalogue::create([
            'name' => 'Indomie Goreng Premium Japanese Shoyu',
            'stock' => 40,
            'price' => 5900,
            'img' => 'GSuo1GLnektTGtpSPmDL.jpg',
        ]);
        Catalogue::create([
            'name' => 'Indomie Goreng Premium Japanese Miso',
            'stock' => 20,
            'price' => 5900,
            'img' => '4Du4uPsa6q5J8xfpLkna.jpg',
        ]);
    }
}

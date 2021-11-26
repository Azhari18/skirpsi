<?php

namespace Database\Seeders;

use App\Models\Good;
use Illuminate\Database\Seeder;

class GoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Good::create([
            'category_id' => 1,
            'name' => 'indomie 1',
            'price' => 1000,
            'img' => 'indomie.jpg'
        ]);

        Good::create([
            'category_id' => 1,
            'name' => 'indomie 2',
            'price' => 2000,
            'img' => 'indomie.jpg'
        ]);

        Good::create([
            'category_id' => 1,
            'name' => 'indomie 3',
            'price' => 3000,
            'img' => 'indomie.jpg'
        ]);

        Good::create([
            'category_id' => 1,
            'name' => 'indomie 4',
            'price' => 4000,
            'img' => 'indomie.jpg'
        ]);
        
        Good::create([
            'category_id' => 2,
            'name' => 'susu indomie',
            'price' => 1000,'img' => 
            'indomie.jpg'
        ]);
    }
}

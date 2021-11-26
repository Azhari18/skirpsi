<?php

namespace Database\Seeders;

use App\Models\Good;
use App\Models\Category;
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

        Category::create([
            'name' => 'Food'
        ]);

        Category::create(
            [
                'name' => 'Drink'
            ]
        );

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
            'category_id' => 1,
            'name' => 'indomie 5',
            'price' => 5000,
            'img' => 'indomie.jpg'
        ]);

        Good::create([
            'category_id' => 1,
            'name' => 'indomie 6',
            'price' => 80000,
            'img' => 'indomie.jpg'
        ]);

        Good::create([
            'category_id' => 1,
            'name' => 'indomie 7',
            'price' => 8000,
            'img' => 'indomie.jpg'
        ]);

        Good::create([
            'category_id' => 1,
            'name' => 'indomie 8',
            'price' => 8000,
            'img' => 'indomie.jpg'
        ]);

        Good::create([
            'category_id' => 1,
            'name' => 'indomie 9',
            'price' => 8000,
            'img' => 'indomie.jpg'
        ]);

        Good::create([
            'category_id' => 2,
            'name' => 'susu indomie',
            'price' => 1000, 'img' =>
            'indomie.jpg'
        ]);

        Good::create([
            'category_id' => 1,
            'name' => 'indomie seleraku',
            'price' => 8000,
            'img' => 'indomie.jpg'
        ]);
    }
}

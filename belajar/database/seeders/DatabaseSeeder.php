<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programing'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

        // User::create([
        //     'name' => 'azhari arsyad' ,
        //     'email' =>'azhari.18des@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // User::create([
        //     'name' => 'arsyad azhari' ,
        //     'email' =>'azhari.20des@gmail.com',
        //     'password' => bcrypt('54321')
        // ]);

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum pertama',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus quisquam facere possimus nam molestiae, debitis quo vel quae exercitationem sed tempore voluptatibus, culpa quibusdam fugiat dolor commodi odio autem quis minima expedita. Quam minima modi quisquam et similique rem incidunt, ducimus necessitatibus nesciunt quaerat, officia possimus sint odio commodi eaque assumenda laboriosam pariatur optio autem dolores rerum? Amet nobis non reprehenderit dolore omnis in inventore, officia nam esse quaerat aspernatur maiores alias tenetur commodi, sed voluptatem similique sit labore minus quasi delectus. Corrupti eligendi sequi eius vel consectetur, dolor repudiandae, atque, consequuntur explicabo minus quas doloribus tempore pariatur libero unde!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum kedua',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus quisquam facere possimus nam molestiae, debitis quo vel quae exercitationem sed tempore voluptatibus, culpa quibusdam fugiat dolor commodi odio autem quis minima expedita. Quam minima modi quisquam et similique rem incidunt, ducimus necessitatibus nesciunt quaerat, officia possimus sint odio commodi eaque assumenda laboriosam pariatur optio autem dolores rerum? Amet nobis non reprehenderit dolore omnis in inventore, officia nam esse quaerat aspernatur maiores alias tenetur commodi, sed voluptatem similique sit labore minus quasi delectus. Corrupti eligendi sequi eius vel consectetur, dolor repudiandae, atque, consequuntur explicabo minus quas doloribus tempore pariatur libero unde!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum ketiga',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus quisquam facere possimus nam molestiae, debitis quo vel quae exercitationem sed tempore voluptatibus, culpa quibusdam fugiat dolor commodi odio autem quis minima expedita. Quam minima modi quisquam et similique rem incidunt, ducimus necessitatibus nesciunt quaerat, officia possimus sint odio commodi eaque assumenda laboriosam pariatur optio autem dolores rerum? Amet nobis non reprehenderit dolore omnis in inventore, officia nam esse quaerat aspernatur maiores alias tenetur commodi, sed voluptatem similique sit labore minus quasi delectus. Corrupti eligendi sequi eius vel consectetur, dolor repudiandae, atque, consequuntur explicabo minus quas doloribus tempore pariatur libero unde!',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum keempat',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus quisquam facere possimus nam molestiae, debitis quo vel quae exercitationem sed tempore voluptatibus, culpa quibusdam fugiat dolor commodi odio autem quis minima expedita. Quam minima modi quisquam et similique rem incidunt, ducimus necessitatibus nesciunt quaerat, officia possimus sint odio commodi eaque assumenda laboriosam pariatur optio autem dolores rerum? Amet nobis non reprehenderit dolore omnis in inventore, officia nam esse quaerat aspernatur maiores alias tenetur commodi, sed voluptatem similique sit labore minus quasi delectus. Corrupti eligendi sequi eius vel consectetur, dolor repudiandae, atque, consequuntur explicabo minus quas doloribus tempore pariatur libero unde!',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;

class PostSeeder extends DatabaseSeeder
{
    public function run()
    {
        $category = Category::first();
        $user = User::first();

        Post::insert([
            [
                'title' => 'The Future of Rave Culture',
                'slug' => Str::slug('The Future of Rave Culture'),
                'content' => 'Exploring how rave music and culture are evolving.',
                'image' => 'images/rave1.jpg',
                'category_id' => $category->id,
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Best Rave Events of 2024',
                'slug' => Str::slug('Best Rave Events of 2024'),
                'content' => 'A guide to the biggest and best rave festivals this year.',
                'image' => 'images/rave2.jpg',
                'category_id' => $category->id,
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Role of DJs in Modern Raves',
                'slug' => Str::slug('The Role of DJs in Modern Raves'),
                'content' => 'Understanding how DJs shape the rave experience.',
                'image' => 'images/rave3.jpg',
                'category_id' => $category->id,
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Essential Rave Outfits & Styles',
                'slug' => Str::slug('Essential Rave Outfits & Styles'),
                'content' => 'Top fashion trends for ravers.',
                'image' => 'images/rave4.jpg',
                'category_id' => $category->id,
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'History of Electronic Dance Music',
                'slug' => Str::slug('History of Electronic Dance Music'),
                'content' => 'Tracing the origins of EDM and its influence on raves.',
                'image' => 'images/rave5.jpg',
                'category_id' => $category->id,
                'user_id' => $user->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::truncate();
        Blog::truncate();
        Category::truncate();
        Category::factory()->create(['name'=>'Personal Development']);
        Category::factory()->create(['name'=>'Entertainment']);
        Blog::factory()->count(5)->create(["category_id"=>1]);
        Blog::factory()->count(5)->create(["category_id"=>2]);
    }
}

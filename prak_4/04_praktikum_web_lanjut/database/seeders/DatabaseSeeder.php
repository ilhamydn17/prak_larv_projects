<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Marbel Education',
            'slug' => 'education',
        ]);
        Category::create([
            'name' => 'Marbel And Friends',
            'slug' => 'friends',
        ]);

        Category::create([
            'name' => 'Riri Story',
            'slug' => 'stories',
        ]);

        Category::create([
            'name' => 'Kolak Song',
            'slug' => 'song',
        ]);

        Product::factory(8)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

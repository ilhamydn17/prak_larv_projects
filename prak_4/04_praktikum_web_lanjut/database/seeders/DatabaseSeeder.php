<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\ProgramSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // membuat seeder category manual
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

        // menjalakan seeder langsung di class database seeder
        Product::factory(8)->create();

        // menjalankan seeder dari class terpisah
        $this->call(ProgramSeeder::class);
        $this->call(NewsSeeder::class);
    }
}

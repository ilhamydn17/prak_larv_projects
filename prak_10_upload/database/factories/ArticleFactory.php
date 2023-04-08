<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //create factory for article
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'featured_image' => $this->faker->image('public/storage/images', 640, 480, null, false),
        ];
    }
}

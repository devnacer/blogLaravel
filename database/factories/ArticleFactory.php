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
            'title' => fake()->name(),
            'content' => fake()->text(50),
            'image' => 'article/articleNoImage.png',
            'profil_id' => fake()->randomElement([1, 2]),
            'category_id' => fake()->randomElement([1, 2, 3, 4]),
        ];
    }
}

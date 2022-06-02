<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'image' => $this->faker->image(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(1),
            'category_id' => CategoryFactory::factory(),
            'created_by' => UserFactory::factory(),
        ];
    }
}

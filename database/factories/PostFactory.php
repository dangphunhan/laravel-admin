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
            'title' => $this->faker->title,
            'status' => $this->faker->status,
            'image' => $this->faker->image,
            'excerpt' => $this->faker->excerpt,
            'content' => $this->faker->content,
            'priority' => $this->faker->priority,
            'posted_at' => $this->faker->posted_at
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
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
            'title' => $title = $this->faker->jobTitle,
            'slug' => $slug = str_replace(' ', '-', $title),
            'body' => $this->faker->paragraph(),
            'user_id' => rand(1, User::USER_COUNT),
        ];
    }
}

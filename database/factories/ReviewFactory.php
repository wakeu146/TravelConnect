<?php

namespace Database\Factories;

use App\Models\{Agency, Review, User};
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Review> */
class ReviewFactory extends Factory
{
    protected $model = Review::class;
    public function definition(): array { return ['agency_id' => Agency::factory(), 'user_id' => User::factory(), 'rating' => fake()->randomElement([2, 3, 3, 4, 4, 4, 5, 5]), 'comment' => fake()->realTextBetween(80, 180), 'status' => 'published']; }
}
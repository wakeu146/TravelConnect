<?php

namespace Database\Factories;

use App\Models\{Agency, Inquiry, User};
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Inquiry> */
class InquiryFactory extends Factory
{
    protected $model = Inquiry::class;
    public function definition(): array { return ['agency_id' => Agency::factory(), 'user_id' => User::factory(), 'subject' => fake()->sentence(6), 'message' => fake()->realTextBetween(100, 220), 'status' => fake()->randomElement(['open', 'responded', 'closed'])]; }
}
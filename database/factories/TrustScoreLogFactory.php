<?php

namespace Database\Factories;

use App\Models\{Agency, TrustScoreLog};
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<TrustScoreLog> */
class TrustScoreLogFactory extends Factory
{
    protected $model = TrustScoreLog::class;
    public function definition(): array { return ['agency_id' => Agency::factory(), 'score' => fake()->numberBetween(45, 98), 'factors' => ['verification' => true, 'reviews' => fake()->numberBetween(1, 5)], 'calculated_at' => fake()->dateTimeBetween('-6 months', 'now')]; }
}
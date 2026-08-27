<?php

namespace Database\Factories;

use App\Models\{Agency, Favorite, User};
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Favorite> */
class FavoriteFactory extends Factory
{
    protected $model = Favorite::class;
    public function definition(): array { return ['user_id' => User::factory(), 'agency_id' => Agency::factory()]; }
}
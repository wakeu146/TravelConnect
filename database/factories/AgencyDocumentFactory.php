<?php

namespace Database\Factories;

use App\Models\Agency;
use App\Models\AgencyDocument;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<AgencyDocument> */
class AgencyDocumentFactory extends Factory
{
    protected $model = AgencyDocument::class;
    public function definition(): array { return ['agency_id' => Agency::factory(), 'type' => fake()->randomElement(['license', 'id_proof', 'business_registration', 'other']), 'file_path' => 'agency-documents/'.fake()->uuid().'.pdf', 'status' => 'pending', 'uploaded_at' => fake()->dateTimeBetween('-1 year', 'now')]; }
}
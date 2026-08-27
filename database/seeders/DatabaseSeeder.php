<?php

namespace Database\Seeders;

use App\Models\{Agency, AgencyDocument, Country, Inquiry, Review, Service, TrustScoreLog, User};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::transaction(function (): void {
            $countries = collect([
                ['name' => 'France', 'code' => 'FR'], ['name' => 'Spain', 'code' => 'ES'],
                ['name' => 'Italy', 'code' => 'IT'], ['name' => 'Portugal', 'code' => 'PT'],
                ['name' => 'Morocco', 'code' => 'MA'], ['name' => 'Canada', 'code' => 'CA'],
                ['name' => 'Japan', 'code' => 'JP'], ['name' => 'Thailand', 'code' => 'TH'],
                ['name' => 'Greece', 'code' => 'GR'], ['name' => 'Australia', 'code' => 'AU'],
                ['name' => 'Switzerland', 'code' => 'CH'], ['name' => 'Iceland', 'code' => 'IS'],
            ])->map(fn (array $country) => Country::create($country));

            $services = collect([
                'Tailor-made itineraries', 'Family holidays', 'Adventure travel', 'Luxury escapes',
                'Cultural tours', 'Honeymoon planning', 'Cruises', 'Business travel',
            ])->map(fn (string $name) => Service::create(['name' => $name]));

            User::factory()->create(['name' => 'Amelie Laurent', 'role' => 'admin', 'email' => 'amelie.laurent@travelconnect.test']);
            $travelers = User::factory(10)->create(['role' => 'traveler']);
            $agencies = collect();

            foreach ([
                'Atlas Horizon Voyages', 'Lumiere Routes', 'Northstar Escapes',
                'Sirocco Travel House', 'Blue Fern Expeditions',
            ] as $companyName) {
                $owner = User::factory()->create(['role' => 'agency_owner']);
                $agency = Agency::factory()->create([
                    'user_id' => $owner->id,
                    'company_name' => $companyName,
                    'verification_status' => 'verified',
                    'trust_score' => fake()->numberBetween(72, 96),
                ]);
                $agency->countries()->attach($countries->random(fake()->numberBetween(2, 4))->pluck('id'));
                $agency->services()->attach($services->random(fake()->numberBetween(2, 5))->pluck('id'));
                AgencyDocument::factory(fake()->numberBetween(1, 3))->create(['agency_id' => $agency->id, 'status' => 'approved']);
                Review::factory(fake()->numberBetween(2, 5))->create([
                    'agency_id' => $agency->id,
                    'user_id' => fn () => $travelers->random()->id,
                ]);
                Inquiry::factory(fake()->numberBetween(1, 3))->create([
                    'agency_id' => $agency->id,
                    'user_id' => fn () => $travelers->random()->id,
                ]);
                TrustScoreLog::factory()->create(['agency_id' => $agency->id, 'score' => $agency->trust_score]);
                $agencies->push($agency);
            }

            foreach ($travelers as $traveler) {
                if ($traveler->id % 2 === 0) {
                    $traveler->favoriteAgencies()->attach($agencies->random(fake()->numberBetween(1, 3))->pluck('id'));
                }
                Review::factory(fake()->numberBetween(1, 2))->create([
                    'user_id' => $traveler->id,
                    'agency_id' => fn () => $agencies->random()->id,
                ]);
            }
        });
    }
}

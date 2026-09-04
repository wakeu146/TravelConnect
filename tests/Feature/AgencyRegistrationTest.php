<?php

namespace Tests\Feature;

use App\Models\Agency;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AgencyRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_agency_registration_creates_an_agency_profile_for_the_owner(): void
    {
        $response = $this->post(route('register.agency.store'), [
            'agency_name' => 'North Star Travel',
            'name' => 'Alex Morgan',
            'email' => 'alex@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'terms' => '1',
        ]);

        $response->assertRedirect(route('auth.success'));

        $user = User::where('email', 'alex@example.com')->firstOrFail();

        $this->assertTrue($user->isAgencyOwner());
        $this->assertAuthenticatedAs($user);
        $this->assertDatabaseHas('agencies', [
            'user_id' => $user->id,
            'company_name' => 'North Star Travel',
            'email' => 'alex@example.com',
            'verification_status' => 'pending',
        ]);
        $this->assertInstanceOf(Agency::class, $user->fresh()->agency);
    }
}
<?php

namespace Tests\Feature;

use App\Models\User;
use App\Notifications\PasswordResetCode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class PasswordRecoveryTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_sends_a_verification_code_for_an_existing_account(): void
    {
        $user = User::factory()->create(['email' => 'traveler@example.com']);
        Notification::fake();

        $response = $this->post(route('password.email'), ['email' => $user->email]);

        $response->assertRedirect(route('password.code'));
        $this->assertDatabaseHas('password_reset_codes', ['email' => $user->email, 'attempts' => 0]);
        Notification::assertSentTo($user, PasswordResetCode::class);
    }

    public function test_an_invalid_code_cannot_continue_recovery(): void
    {
        $email = 'traveler@example.com';
        User::factory()->create(['email' => $email]);
        DB::table('password_reset_codes')->insert([
            'email' => $email,
            'code_hash' => Hash::make('123456'),
            'attempts' => 0,
            'expires_at' => now()->addMinutes(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $response = $this->from(route('password.code'))->post(route('password.code.verify'), [
            'email' => $email,
            'code' => '654321',
        ]);

        $response->assertRedirect(route('password.code'));
        $response->assertSessionHasErrors('code');
        $this->assertDatabaseHas('password_reset_codes', ['email' => $email, 'attempts' => 1]);
    }

    public function test_a_valid_code_allows_the_user_to_set_a_new_password(): void
    {
        $email = 'traveler@example.com';
        $user = User::factory()->create(['email' => $email, 'password' => 'old-password']);
        DB::table('password_reset_codes')->insert([
            'email' => $email,
            'code_hash' => Hash::make('123456'),
            'attempts' => 0,
            'expires_at' => now()->addMinutes(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->withSession(['password_reset_email' => $email])
            ->post(route('password.code.verify'), ['email' => $email, 'code' => '123456'])
            ->assertRedirect(route('password.reset'));

        $response = $this->post(route('password.update'), [
            'password' => 'new-secure-password',
            'password_confirmation' => 'new-secure-password',
        ]);

        $response->assertRedirect(route('login'));
        $this->assertTrue(Hash::check('new-secure-password', $user->refresh()->password));
        $this->assertDatabaseMissing('password_reset_codes', ['email' => $email]);
    }
}

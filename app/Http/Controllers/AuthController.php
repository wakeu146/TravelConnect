<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Notifications\PasswordResetCode;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class AuthController extends Controller
{
    public function updateProfilePhoto(Request $request): RedirectResponse
    {
        $request->validate(['profile_photo' => ['required', 'image', 'max:2048']]);
        $user = $request->user();

        if ($user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path);
        }

        $user->update(['profile_photo_path' => $request->file('profile_photo')->store('profile-photos', 'public')]);

        return back()->with('status', 'Profile photo updated.');
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $user = $request->user();
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:191', 'unique:users,email,'.$user->id],
            'phone' => ['nullable', 'string', 'max:30'],
        ]);

        $user->update($data);

        return back()->with('status', 'Profile information updated.');
    }

    public function registerTraveler(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:191', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'terms' => ['accepted'],
        ], [
            'email.unique' => 'An account with this email already exists. Please use another email or log in.',
            'password.min' => 'Your password must be at least 6 characters.',
            'password.confirmed' => 'Your passwords do not match.',
            'terms.accepted' => 'You must accept the terms to create an account.',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => UserRole::TRAVELER,
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('auth.success')->with([
            'message' => 'Registration successful',
            'success_redirect' => route('login'),
        ]);
    }

    public function registerAgency(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'agency_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:191', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'terms' => ['accepted'],
        ], [
            'email.unique' => 'An account with this email already exists. Please use another email or log in.',
            'password.min' => 'Your password must be at least 6 characters.',
            'password.confirmed' => 'Your passwords do not match.',
            'terms.accepted' => 'You must accept the terms to create an account.',
        ]);

        $user = DB::transaction(function () use ($data): User {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'role' => UserRole::AGENCY_OWNER,
            ]);

            $user->agency()->create([
                'company_name' => $data['agency_name'],
                'description' => '',
                'license_number' => '',
                'email' => $data['email'],
            ]);

            return $user;
        });

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('auth.success')->with([
            'message' => 'Registration successful',
            'success_redirect' => route('login'),
        ]);
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors(['email' => 'These credentials do not match our records.'])->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->route('auth.success')->with('message', 'Login successful');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function sendResetLink(Request $request): RedirectResponse
    {
        $email = Str::lower($request->validate(['email' => ['required', 'email']])['email']);
        $user = User::where('email', $email)->first();

        if (! $user) {
            return back()->with('status', 'If an account exists for that email, a verification code has been sent.');
        }

        $code = (string) random_int(100000, 999999);
        DB::table('password_reset_codes')->updateOrInsert(
            ['email' => $email],
            [
                'code_hash' => Hash::make($code),
                'attempts' => 0,
                'expires_at' => now()->addMinutes(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        );

        try {
            $user->notify(new PasswordResetCode($code));
        } catch (TransportExceptionInterface $exception) {
            DB::table('password_reset_codes')->where('email', $email)->delete();
            Log::error('Password reset code email could not be sent.', [
                'email' => $email,
                'exception' => $exception,
            ]);

            return back()->withErrors([
                'email' => 'We could not send the reset email right now. Please try again later.',
            ])->withInput();
        }

        $request->session()->put('password_reset_email', $email);

        return redirect()->route('password.code');
    }

    public function showCodeForm(Request $request): View
    {
        return view('auth.verify-reset-code', ['email' => session('password_reset_email')]);
    }

    public function verifyResetCode(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'code' => ['required', 'digits:6'],
        ]);
        $email = Str::lower($data['email']);
        $resetCode = DB::table('password_reset_codes')->where('email', $email)->first();

        if (! $resetCode || now()->greaterThan($resetCode->expires_at) || $resetCode->attempts >= 5) {
            return back()->withErrors(['code' => 'This verification code is invalid or expired.'])->withInput();
        }

        if (! Hash::check($data['code'], $resetCode->code_hash)) {
            DB::table('password_reset_codes')->where('email', $email)->increment('attempts');

            return back()->withErrors(['code' => 'This verification code is incorrect.'])->withInput();
        }

        DB::table('password_reset_codes')->where('email', $email)->delete();
        $request->session()->put('password_reset_verified_email', $email);

        return redirect()->route('password.reset');
    }

    public function showResetForm(Request $request): View|RedirectResponse
    {
        if (! $request->session()->has('password_reset_verified_email')) {
            return redirect()->route('password.request');
        }

        return view('auth.reset-password');
    }

    public function resetPassword(Request $request): RedirectResponse
    {
        $email = $request->session()->get('password_reset_verified_email');
        if (! $email) {
            return redirect()->route('password.request');
        }

        $data = $request->validate(['password' => ['required', 'string', 'min:8', 'confirmed']]);
        $user = User::where('email', $email)->first();

        if (! $user) {
            return redirect()->route('password.request')->withErrors(['email' => 'We could not find that account.']);
        }

        $user->forceFill([
            'password' => $data['password'],
            'remember_token' => Str::random(60),
        ])->save();
        $request->session()->forget(['password_reset_email', 'password_reset_verified_email']);

        return redirect()->route('login')->with('status', 'Your password has been reset.');
    }
}

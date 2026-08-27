<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('/discover', 'discover')->name('discover');
Route::get('/agencies/{slug}', function (string $slug) {
    $agencies = [
        'atlas-horizon-voyages' => ['name' => 'Atlas Horizon Voyages', 'country' => 'France', 'service' => 'Adventure travel', 'rating' => '4.9', 'reviews' => '38', 'description' => 'Tailor-made adventures across Europe and beyond, planned by a team that knows the routes personally.', 'cover' => 'https://images.unsplash.com/photo-1530789253388-582c481c54b0?auto=format&fit=crop&w=1600&q=85'],
        'lumiere-routes' => ['name' => 'Lumiere Routes', 'country' => 'Portugal', 'service' => 'Luxury escapes', 'rating' => '4.8', 'reviews' => '31', 'description' => 'Slow travel and beautiful escapes, thoughtfully planned around the details that make a journey memorable.', 'cover' => 'https://images.unsplash.com/photo-1528127269322-539801943592?auto=format&fit=crop&w=1600&q=85'],
        'northstar-escapes' => ['name' => 'Northstar Escapes', 'country' => 'Canada', 'service' => 'Family holidays', 'rating' => '4.9', 'reviews' => '44', 'description' => 'Family journeys built around practical planning, local insight, and the moments that matter.', 'cover' => 'https://images.unsplash.com/photo-1522083165195-3424ed129620?auto=format&fit=crop&w=1600&q=85'],
        'sirocco-travel-house' => ['name' => 'Sirocco Travel House', 'country' => 'Morocco', 'service' => 'Cultural tours', 'rating' => '4.7', 'reviews' => '26', 'description' => 'Cultural journeys shaped by local knowledge, meaningful encounters, and carefully chosen routes.', 'cover' => 'https://images.unsplash.com/photo-1539650116574-75c0c6d73f6e?auto=format&fit=crop&w=1600&q=85'],
    ];

    abort_unless(isset($agencies[$slug]), 404);

    return view('agency-show', ['agency' => $agencies[$slug], 'gallery' => [
        ['image' => 'https://images.unsplash.com/photo-1527631746610-bca00a040d60?auto=format&fit=crop&w=1000&q=85', 'alt' => 'Travelers hiking through a mountain landscape'],
        ['image' => 'https://images.unsplash.com/photo-1526772662000-3f88f10405ff?auto=format&fit=crop&w=1000&q=85', 'alt' => 'Traveler viewing a scenic destination'],
        ['image' => 'https://images.unsplash.com/photo-1501555088652-021faaa?auto=format&fit=crop&w=1000&q=85', 'alt' => 'Travelers exploring an outdoor destination'],
    ]]);
})->name('agency.show');
Route::view('/how-it-works', 'how-it-works')->name('how-it-works');
Route::view('/for-agencies', 'for-agencies')->name('for-agencies');
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:login')->name('login.store');
Route::view('/register', 'auth.account-type')->name('register');
Route::view('/register/agency', 'auth.register')->name('register.agency');
Route::post('/register/agency', [AuthController::class, 'registerAgency'])->middleware('throttle:register')->name('register.agency.store');
Route::view('/register/traveler', 'auth.traveler-register')->name('register.traveler');
Route::post('/register/traveler', [AuthController::class, 'registerTraveler'])->middleware('throttle:register')->name('register.traveler.store');
Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->middleware('throttle:password.email')->name('password.email');
Route::get('/verify-reset-code', [AuthController::class, 'showCodeForm'])->name('password.code');
Route::post('/verify-reset-code', [AuthController::class, 'verifyResetCode'])->middleware('throttle:password.code')->name('password.code.verify');
Route::get('/reset-password', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->middleware('throttle:password.reset')->name('password.update');
Route::view('/login-successful', 'auth.success')->middleware('auth')->name('auth.success');
Route::view('/dashboard', 'auth.dashboard')->middleware('auth')->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

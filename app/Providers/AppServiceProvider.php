<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('login', fn (Request $request) => Limit::perMinute(5)->by($request->string('email')->lower().'|'.$request->ip()));
        RateLimiter::for('register', fn (Request $request) => Limit::perMinute(5)->by($request->ip()));
        RateLimiter::for('password.email', fn (Request $request) => Limit::perMinute(5)->by($request->string('email')->lower().'|'.$request->ip()));
        RateLimiter::for('password.code', fn (Request $request) => Limit::perMinute(10)->by($request->string('email')->lower().'|'.$request->ip()));
        RateLimiter::for('password.reset', fn (Request $request) => Limit::perMinute(5)->by($request->ip()));
    }
}

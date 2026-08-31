<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $requestedLocale = $request->query('lang');

        if ($request->hasSession()) {
            $locale = $requestedLocale ?? $request->session()->get('locale', config('app.locale'));
        } else {
            $locale = $requestedLocale ?? config('app.locale');
        }

        if (! in_array($locale, ['en', 'fr'], true)) {
            $locale = config('app.locale');
        }

        app()->setLocale($locale);

        if ($request->hasSession()) {
            $request->session()->put('locale', $locale);
        }

        return $next($request);
    }
}

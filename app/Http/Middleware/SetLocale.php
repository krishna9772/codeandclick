<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $supportedLocales = config('base.supported_locales', ['en', 'mm']);
        $fallbackLocale = config('app.fallback_locale', 'en');
        $locale = session('locale', config('app.locale', $fallbackLocale));

        if (! in_array($locale, $supportedLocales, true)) {
            $locale = $fallbackLocale;
        }

        app()->setLocale($locale);

        return $next($request);
    }
}

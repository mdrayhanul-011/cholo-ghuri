<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request and set the application locale based on route parameter or default.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route('locale');

        if ($locale && in_array($locale, config('localization.supported_locales', ['bn', 'en']))) {
            App::setLocale($locale);
        } else {
            App::setLocale(config('localization.default_locale', 'bn'));
        }

        return $next($request);
    }
}

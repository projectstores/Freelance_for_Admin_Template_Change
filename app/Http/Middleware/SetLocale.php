<?php

namespace App\Http\Middleware;

use Cache;
use Closure;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if application installed
        if (isInstalled()) {
            
            // Get locale
            $locale   = session()->has('locale') ? session()->get('locale') : settings('general')->default_language;
    
            // Get language
            $language = Cache::rememberForever('middleware_locale_' . $locale, function () use ($locale) {
                return Language::where('is_active', true)->where('language_code', $locale)->first();
            });
    
            // Check if language exists
            if ($language) {
                
                // Set app locale
                App::setLocale($language->language_code);
    
                // Set direction
                config()->set('direction', $language->force_rtl ? 'rtl' : 'ltr');

                // Set backend timing locale
                config()->set('backend_timing_locale', $language->backend_timing_locale);

                // Set frontend timing locale
                config()->set('frontend_timing_locale', $language->frontend_timing_locale);
    
            } else {
    
                // Set default locale
                App::setLocale(settings('general')->default_language);
    
                // Set direction
                config()->set('direction', 'ltr');

                // Set backend timing locale
                config()->set('backend_timing_locale', 'en_US');

                // Set frontend timing locale
                config()->set('frontend_timing_locale', 'en');
    
            }
    
            // Continue
            return $next($request);

        } else {

            // Set direction
            config()->set('direction', 'ltr');

            // Set backend timing locale
            config()->set('backend_timing_locale', 'en_US');

            // Set frontend timing locale
            config()->set('frontend_timing_locale', 'en');

            // Continue
            return $next($request);

        }
    }
}

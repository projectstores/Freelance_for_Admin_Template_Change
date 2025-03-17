<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class XFrameHeaders
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
        $headers                            = [
            'X-Frame-Options'                   => 'DENY',
            'X-XSS-Protection'                  => '1; mode=block',
            'X-Permitted-Cross-Domain-Policies' => 'master-only',
            'X-Content-Type-Options'            => 'nosniff',
            'Referrer-Policy'                   => 'no-referrer-when-downgrade',
            'Strict-Transport-Security'         => 'max-age=31536000; includeSubDomains',
            'Cache-Control'                     => 'no-cache, no-store, must-revalidate, post-check=0, pre-check=0',
            'Pragma'                            => 'no-cache',
            'Expires'                           => 'Sat, 26 Jul 1997 05:00:00 GMT',
        ];
        
        $response = $next($request);
        
        foreach($headers as $key => $value) {
            $response->headers->set($key, $value);
        }
 
        return $response;
    }
}
